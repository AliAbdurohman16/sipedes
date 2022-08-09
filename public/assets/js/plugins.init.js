/* Template Name: Landrick - Saas & Software Landing Page Template
   Author: Shreethemes
   E-mail: support@shreethemes.in
   Created: August 2019
   Version: 4.2.0
   Updated: March 2022
   File Description: Common JS file of the template(plugins.init.js)
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Tiny Slider          *
 *     02.  Countdown Js         * (For Comingsoon pages)
 *     03.  Maintenance js       * (For Maintenance page)
 *     04.  Data Counter         *
 *     05.  Gallery filter js    * (For Portfolio pages)
 *     06.  Tobii lightbox       * (For Portfolio pages)
 *     07.  CK Editor            * (For Compose mail)
 *     08.  Validation Form      * 
 *     09.  Switcher Pricing Plan* 
 *     10.  Charts               * 
 *     11.  Switcher Js          * 
 ================================*/
         
//=========================================//
/*            01) Tiny slider              */
//=========================================//
if(document.getElementsByClassName('tiny-single-item').length > 0) {
    var slider = tns({
        container: '.tiny-single-item',
        items: 1,
        controls: false,
        mouseDrag: true,
        loop: true,
        rewind: true,
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 3000,
        navPosition: "bottom",
        speed: 400,
        gutter: 16,
    });
};

//=========================================//
/*/*            02) Countdown js           */
//=========================================//

try {
    if(document.getElementById("days")){
        // The data/time we want to countdown to
        var eventCountDown = new Date("December 25, 2022 16:37:52").getTime();

        // Run myfunc every second
        var myfunc = setInterval(function () {

            var now = new Date().getTime();
            var timeleft = eventCountDown - now;

            // Calculating the days, hours, minutes and seconds left
            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

            // Result is output to the specific element
            document.getElementById("days").innerHTML = days + "<p class='count-head'>Days</p> "
            document.getElementById("hours").innerHTML = hours + "<p class='count-head'>Hours</p> "
            document.getElementById("mins").innerHTML = minutes + "<p class='count-head'>Mins</p> "
            document.getElementById("secs").innerHTML = seconds + "<p class='count-head'>Secs</p> "

            // Display the message when countdown is over
            if (timeleft < 0) {
                clearInterval(myfunc);
                document.getElementById("days").innerHTML = ""
                document.getElementById("hours").innerHTML = ""
                document.getElementById("mins").innerHTML = ""
                document.getElementById("secs").innerHTML = ""
                document.getElementById("end").innerHTML = "00:00:00:00";
            }
        }, 1000);
    }
} catch (err) {

}


//=========================================//
/*/*            03) Maintenance js         */
//=========================================//

try {
    if(document.getElementById("maintenance")){
        var seconds = 3599;
        function secondPassed() {
            var minutes = Math.round((seconds - 30) / 60);
            var remainingSeconds = seconds % 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
            }
            document.getElementById('maintenance').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('maintenance').innerHTML = "Buzz Buzz";
            } else {
                seconds--;
            }
        }
        var countdownTimer = setInterval('secondPassed()', 1000);
    }
} catch (err) {

}

//=========================================//
/*/*            04) Data Counter           */
//=========================================//

try {
    const counter = document.querySelectorAll('.counter-value');
    const speed = 2500; // The lower the slower

    counter.forEach(counter_value => {
        const updateCount = () => {
            const target = +counter_value.getAttribute('data-target');
            const count = +counter_value.innerText;

            // Lower inc to slow and higher to slow
            var inc = target / speed;

            if (inc < 1) {
                inc = 1;
            }

            // Check if target is reached
            if (count < target) {
                // Add inc to count and output in counter_value
                counter_value.innerText = (count + inc).toFixed(0);
                // Call function every ms
                setTimeout(updateCount, 1);
            } else {
                counter_value.innerText = target;
            }
        };

        updateCount();
    });
} catch (err) {

}

//=========================================//
/*/*            05) Gallery filter js      */
//=========================================//

try {
    var Shuffle = window.Shuffle;

    class Demo {
        constructor(element) {
            if(element){
                this.element = element;
                this.shuffle = new Shuffle(element, {
                    itemSelector: '.picture-item',
                    sizer: element.querySelector('.my-sizer-element'),
                });

                // Log events.
                this.addShuffleEventListeners();
                this._activeFilters = [];
                this.addFilterButtons();
            }
        }

        /**
         * Shuffle uses the CustomEvent constructor to dispatch events. You can listen
         * for them like you normally would (with jQuery for example).
         */
        addShuffleEventListeners() {
            this.shuffle.on(Shuffle.EventType.LAYOUT, (data) => {
                console.log('layout. data:', data);
            });
            this.shuffle.on(Shuffle.EventType.REMOVED, (data) => {
                console.log('removed. data:', data);
            });
        }

        addFilterButtons() {
            const options = document.querySelector('.filter-options');
            if (!options) {
                return;
            }

            const filterButtons = Array.from(options.children);
            const onClick = this._handleFilterClick.bind(this);
            filterButtons.forEach((button) => {
                button.addEventListener('click', onClick, false);
            });
        }

        _handleFilterClick(evt) {
            const btn = evt.currentTarget;
            const isActive = btn.classList.contains('active');
            const btnGroup = btn.getAttribute('data-group');

            this._removeActiveClassFromChildren(btn.parentNode);

            let filterGroup;
            if (isActive) {
                btn.classList.remove('active');
                filterGroup = Shuffle.ALL_ITEMS;
            } else {
                btn.classList.add('active');
                filterGroup = btnGroup;
            }

            this.shuffle.filter(filterGroup);
        }

        _removeActiveClassFromChildren(parent) {
            const { children } = parent;
            for (let i = children.length - 1; i >= 0; i--) {
                children[i].classList.remove('active');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        window.demo = new Demo(document.getElementById('grid'));
    });
} catch (err) {

}


//=========================================//
/*/*            06) Tobii lightbox         */
//=========================================//

try {
    const tobii = new Tobii()
} catch (err) {

}


//=========================================//
/*/*            07) CK Editor              */
//=========================================//

try {
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
} catch(err) {

}

//=========================================//
/*/*    08) Validation Shop Checkouts      */
//=========================================//

(function () {
    'use strict'

    if(document.getElementsByClassName('needs-validation').length > 0) {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    }
})()


//=========================================//
/*/*      09) Switcher Pricing Plans       */
//=========================================//
try {
    var e = document.getElementById("filt-monthly"),
        d = document.getElementById("filt-yearly"),
        t = document.getElementById("switcher"),
        m = document.getElementById("monthly"),
        y = document.getElementById("yearly");

    e.addEventListener("click", function(){
        t.checked = false;
        e.classList.add("toggler--is-active");
        d.classList.remove("toggler--is-active");
        m.classList.remove("hide");
        y.classList.add("hide");
    });

    d.addEventListener("click", function(){
        t.checked = true;
        d.classList.add("toggler--is-active");
        e.classList.remove("toggler--is-active");
        m.classList.add("hide");
        y.classList.remove("hide");
    });

    t.addEventListener("click", function(){
        d.classList.toggle("toggler--is-active");
        e.classList.toggle("toggler--is-active");
        m.classList.toggle("hide");
        y.classList.toggle("hide");
    })
} catch(err) {

}


//=========================================//
/*/*      10) Charts                       */
//=========================================//
//Chart One
try {
    var options = {
        chart: {
            height: 360,
            type: 'area',
            width: '100%',
            stacked: true,
            toolbar: {
              show: false,
              autoSelected: 'zoom'
            },
        },
        colors: ['#2f55d4', '#2eca8b'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: [1.5, 1.5],
            dashArray: [0, 4],
            lineCap: 'round',
        },
        grid: {
          padding: {
            left: 0,
            right: 0
          },
          strokeDashArray: 3,
        },
        markers: {
          size: 0,
          hover: {
            size: 0
          }
        },
        series: [{
            name: 'Item Sales',
            data: [0, 100, 40, 110, 60, 140, 55, 130, 65, 180, 75, 115],
        }, {
            name: 'Revenue',
            data: [0, 45, 10, 75, 35, 94, 40, 115, 30, 105, 65, 110],
        }],
        xaxis: {
            type: 'month',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
              show: true,
            },  
            axisTicks: {
              show: true,
            },
        },
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: .8,
            opacityFrom: 0.3,
            opacityTo: 0.2,
            stops: [0, 80, 100]
          }
        },
        
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        legend: {
          position: 'bottom',
          offsetY: 0,
        },
      }
      
      var chart = new ApexCharts(
        document.querySelector("#dashboard"),
        options
      );
      
      chart.render();
} catch (error) {
    
}

//Chart two
try {
    var options2 = {
        chart: {
            type: 'bar',
            height: 100,
            sparkline: {
                enabled: true
            }
        },
        colors: ["#2f55d4"],
        plotOptions: {
            bar: {
                columnWidth: '30%'
            }
        },
        series: [{
            data: [30, 50, 60, 42, 48, 56, 29, 25, 46, 12, 58, 45, 89, 52, 41, 20, 13, 5, 20, 15, 19, 45, 45, 86, 75, 66, 55, 46, 61, 66]
        }],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    }
    new ApexCharts(document.querySelector("#sale-chart"), options2).render();
} catch (error) {
    
}

//Chart Three
try {
    var options = {
        chart: {
            height: 320,
            type: 'donut',
        },
        series: [45, 21, 23, 28],
        labels: ["Item 1", "Item 2", "Item 3", "Item 4"],
        legend: {
            show: true,
            position: 'bottom',
            offsetY: 0,
        },
        dataLabels: {
            enabled: true,
            dropShadow: {
                enabled: false,
            }
        },
        stroke: {
            show: true,
            colors: ['transparent'],
        },
        // dataLabels: {
        //     enabled: false,
        // },
        theme: {
            monochrome: {
                enabled: true,
                color: '#2f55d4',
            }
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 400,
                },
            }
        }]
    }
    var chart = new ApexCharts(document.querySelector("#top-product-chart"), options);
    chart.render();
} catch (error) {
    
}

//=========================================//
/*            11) Switcher JS              */
//=========================================//

try {    
    function setColor(theme) {
        document.getElementById('color-opt').href = './css/colors/' + theme + '.css';
        toggleSwitcher(false);
    };
    
    function setTheme(theme) {
        let bootstarpHref;
        let styleHref;

        switch (theme) {
            case "style-dark":
                bootstarpHref =  `assets/css/bootstrap-dark.min.css`
                styleHref = "assets/css/style-dark.min.css"
                break;
                case "style-rtl":
                bootstarpHref =  `assets/css/bootstrap-rtl.min.css`
                styleHref = "assets/css/style-rtl.min.css"
                break;
                case "style-dark-rtl":
                bootstarpHref =  `assets/css/bootstrap-dark-rtl.min.css`
                styleHref = "assets/css/style-dark-rtl.min.css"
                break;               
        
            default:
                bootstarpHref =  `assets/css/bootstrap.min.css`
                styleHref = "assets/css/style.min.css"
                break;
        }

        if(theme === "style-rtl" || theme === "style-dark-rtl"   ) document.getElementsByTagName("html")[0].dir = "rtl"
        else  document.getElementsByTagName("html")[0].dir = "ltr"
       
        document.getElementsByClassName('theme-opt')[0].href =bootstarpHref
        document.getElementsByClassName('theme-opt')[1].href =styleHref
        // toggleSwitcher(false);
    };
} catch (error) {
    
}