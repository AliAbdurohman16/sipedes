let uploadButton = document.getElementById("image");
let chosenImage = document.getElementById("chosen-image");

uploadButton.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);
    reader.onload = () => {
        chosenImage.setAttribute("src", reader.result);
    }
}
