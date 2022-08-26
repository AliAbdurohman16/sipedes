const express = require("express");
const bodyParser = require("body-parser");
const app = require("express")();
const server = require("http").createServer(app);
const fs = require("fs");
const qrcode = require("qrcode");
var qrpic = require('qr-image');
const io = require("socket.io")(server);
const axios = require("axios");
const port = process.env.PORT || 5000;
const {
  WAConnection,
  MessageType,
  Presence,
  MessageOptions,
  Mimetype,
  WALocationMessage,
  WA_MESSAGE_STUB_TYPES,
  ReconnectMode,
  ProxyAgent,
  waChatKey,
} = require("@adiwajshing/baileys");


// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))
// parse application/json
app.use(bodyParser.json())
async function connectToWhatsApp () {
const conn = new WAConnection();
conn.autoReconnect = ReconnectMode.onConnectionLost;
// conn.connectOptions = { reconnectID: "reconnect" };
conn.on('credentials-updated', () =>
{
   // save credentials whenever updated
   console.log(`credentials updated!`)
   const authInfo = conn.base64EncodedAuthInfo() // get all the auth info we need to restore this session
   fs.writeFileSync('./session.json', JSON.stringify(authInfo, null, '\t')) // save this info to a file
})
fs.existsSync('./session.json') && conn.loadAuthInfo('./session.json')
// uncomment the following line to proxy the connection; some random proxy I got off of: https://proxyscrape.com/free-proxy-list
//conn.connectOptions.agent = ProxyAgent ('http://1.0.180.120:8080')

async function connect() {
  fs.existsSync("./session.json") && conn.loadAuthInfo("./session.json");
  await conn.connect({ timeoutMs: 30 * 1000 });

  console.log("oh hello " + conn.user.name + " (" + conn.user.jid + ")");
}

connect().catch((err) => {
  console.log(err);
});

io.on("connection", function (socket) {

  conn.on("credentials-updated", () => {
    // save credentials whenever updated
    console.log(`credentials updated`);
    const authInfo = conn.base64EncodedAuthInfo(); // get all the auth info we need to restore this session
    fs.writeFileSync("./session.json", JSON.stringify(authInfo, null, "\t")); // save this info to a file
  });

  conn.on("close", async ({ reason, isReconnecting }) => {
    console.log(
      "Disconnected because " + reason + ", reconnecting: " + isReconnecting
    );
    if (!isReconnecting) {
      if (fs.existsSync("./session.json")) {
        fs.unlinkSync("./session.json");
      }
      conn.clearAuthInfo();
      await conn.connect({ timeoutMs: 30 * 1000 });
    }
  });
});

let lastqr;
conn.on('qr', qr => {
  lastqr = qr
});

console.log(conn.contacts['6285155126055@s.whatsapp.net']);
app.get("/info", async (req, res ,next) => {
try {
const potoprofile = await conn.getProfilePicture (conn.user.jid)
if(conn.user.jid === "undefined"){
console.log("error");
}else{
res.json({
      user: conn.user.name,
      jumlahchat: conn.chats.length,
      number: conn.user.jid,
      pp: potoprofile
        })
}
}
catch (e) {
console.log("error")
}
})
app.get("/lastqr", (req, res) => {
  res.status(200).json({ lastqr })
});
app.get("/qr", (req, res) => {
if (
    fs.existsSync("./session.json") &&
    conn.loadAuthInfo("./session.json")
  ) {
    res.send("Session Exist");
  } else {
    var code = qrpic.image(lastqr, { type: 'png', ec_level: 'H', size: 10, margin: 0 });
   res.setHeader('Content-type', 'image/png');
  
    code.pipe(res);
  }
});

app.get('/msg', async (req, res) => {
  let phone = req.query.number;
  let message = req.query.message;
  let firstnumber = phone;
  //   console.log(firstnumber);
  if (phone == undefined || message == undefined) {
    res.send({
      status: "error",
      message: "please enter valid phone and message",
    });
    console.log("number and message undefined");
  } else {
    conn.isOnWhatsApp(phone + "@s.whatsapp.net").then((is) => {
      if (is) {
        conn
          .sendMessage(phone + "@s.whatsapp.net", message, MessageType.text)
          .then((response) => {
            res.send({
              status: "success",
              message: "Message successfully sent to " + phone,
            });
            console.log(`Message successfully sent to ${phone}`);
          });
      } else {
        res.send({
          status: "error",
          message: phone + " is not a whatsapp user",
        });
        console.log(`${phone} is not a whatsapp number`);
      }
    });
  }
});
app.get("/pic", async (req, res) => {
let phone = req.query.number;
const ppUrl = await conn.getProfilePicture (phone + "@s.whatsapp.net") // leave empty to get your own
res.send(ppUrl)

});
conn.on('chats-received', async ({ hasNewChats }) => {
app.get("/pesan-diterima", (req, res) => {
        console.log(`you have ${conn.chats.length} chats, new chats available: ${hasNewChats}`)
});
});
app.get("/get-chats", (req, res) => {
 conn
 .getChats()
     .then((chats) => {
       res.send({ status: "success", message: chats });
     })
    .catch(() => {
       res.send({ status: "error", message: "getchatserror" });
     });
 });

}
connectToWhatsApp ()
.catch (err => console.log("unexpected error: " + err) ) // catch any errors

server.listen(port, () => {
  console.log("Server Running Live on Port : " + port);
});
