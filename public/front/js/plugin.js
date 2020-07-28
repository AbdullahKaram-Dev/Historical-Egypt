/*for random number*/
function random(how, express) {
    function ran() {
        let num = Math.floor(Math.random() * express)
        return num
    }
    let set = new Set([ran()]);
    if (set.size === how) {
        return set
    } else {
        function again() {
            for (i = 0; i < 1; i++) {
                set.add(ran());
            }
            return (set.size === how) ? set : again()
        }
        again()
    }
    return set
}
/*for random number*/

/*MachineText*/
function MachineText(ele, text, i, arr) {
    this.ele = ele
    this.text = text
    this.i = i
    this.arr = arr
}
/*MachineText*/

/*first*/
let h1 = document.getElementById("spring");
let str = "Beautiful Egypt";
let first = new MachineText(h1, str, 0, [...random(2, str.length)])
first.fun = function() {
        if (first.arr[0] === 9 || first.arr[1] === 9) {
            if (first.arr[0] === 8 || first.arr[1] === 8) {
                first.arr[0] += 2;
                first.arr[1] += 2;
            } else if (first.arr[0] === 14 || first.arr[1] === 14) {
                first.arr[0] = first.arr[0] - 1;
                first.arr[1] = first.arr[1] - 1;
            } else {
                first.arr[0] += 1;
                first.arr[1] += 1;
            }
        }
        let interval = setInterval(function() {
            if (first.arr[0] === first.i || first.arr[1] === first.i) {
                let span = document.createElement("span"),
                    color = document.createTextNode(first.text[first.i]);
                span.appendChild(color);
                span.classList.add("one");
                first.ele.appendChild(span);
            } else {
                first.ele.innerHTML += first.text[first.i];
            }
            first.i++;
            if (first.i === first.text.length) {
                clearInterval(interval)
            }
        }, 100)
    }
    /*first*/

/*second*/

let pr = document.getElementById("pr");
let strr = "Egypt is home to the oldest civilizations on earth, where its name is derived from the Greek word Aegyptos, and in 5500 BC there were two main kingdoms that stretched over the Nile River, the Egyptian historians called them Upper Egypt, Egypt, and Sefa, 3200 CE. The two kingdoms are under one rule, and one ruler who takes over their affairs is King Narmer who is called Menes, and this marked the beginning of the ancient civilization of Egypt.";
let second = new MachineText(pr, strr, 0, [...random(30, strr.length)])
second.funn = function() {
        let intervall = setInterval(function() {
            if (second.arr[0] === second.i || second.arr[1] === second.i || second.arr[2] === second.i || second.arr[3] === second.i || second.arr[4] === second.i || second.arr[5] === second.i || second.arr[6] === second.i || second.arr[7] === second.i || second.arr[8] === second.i || second.arr[9] === second.i || second.arr[10] === second.i || second.arr[11] === second.i || second.arr[12] === second.i || second.arr[13] === second.i || second.arr[14] === second.i || second.arr[15] === second.i || second.arr[16] === second.i || second.arr[17] === second.i || second.arr[18] === second.i || second.arr[19] === second.i || second.arr[20] === second.i || second.arr[21] === second.i || second.arr[22] === second.i || second.arr[23] === second.i || second.arr[24] === second.i || second.arr[25] === second.i || second.arr[26] === second.i || second.arr[27] === second.i || second.arr[28] === second.i || second.arr[29] === second.i) {
                let span = document.createElement("span"),
                    color = document.createTextNode(second.text[second.i]);
                span.appendChild(color);
                span.classList.add("one");
                second.ele.appendChild(span);
            } else {
                second.ele.innerHTML += second.text[second.i];
            }
            second.i++;
            if (second.i === second.text.length) {
                clearInterval(intervall)
            }
        }, 10)
    }
    /*second*/

/*start brand*/
function brand(src) {
    let brand = document.getElementById("brand");
    brand.onclick = _ => open(src, "_self")
}
/*end brand*/

/*fun nav scroll*/
let nav = document.getElementById("nav");
let content = document.getElementsByClassName("content");
let off = nav.offsetTop;

function scrollnav() {
    if (window.pageYOffset >= off) {
        nav.classList.add("fixed")
        content[0].style.marginTop = "63px";
    } else {
        if (nav.classList.contains("fixed")) {
            nav.classList.remove("fixed")
            content[0].style.marginTop = "0";
        }
    }
}
/*fun nav scroll*/

/*fun post collapse*/
let controlspan = document.querySelectorAll(".second .side span");
let controlpost = document.querySelectorAll(".second .post");
let controlspanthird = document.querySelectorAll(".third .side-third span");
let controlpostthird = document.querySelectorAll(".third .post-third");
let controlspanfourty = document.querySelectorAll(".fourty .side-fourty span");
let controlpostfourty = document.querySelectorAll(".fourty .post-fourty");
let controlspanfifth = document.querySelectorAll(".fifth .side-fifth span");
let controlpostfifth = document.querySelectorAll(".fifth .post-fifth");

function post(sp, po) {
    for (let i of sp) {
        i.onclick = function() {
            let spactive = sp.filter(function(ele) {
                if (ele.classList.contains("active")) {
                    return ele
                }
            })
            let poactive = po.filter(function(ele) {
                if (ele.classList.contains("active")) {
                    return ele
                }
            })
            spactive[0].classList.remove("active");
            this.classList.add("active")
            poactive[0].classList.remove("active")
            let data = this.getAttribute("data-num");
            setTimeout(() => {
                document.querySelector(`#${data}`).classList.add("active")
            }, 600);
        }
    }
}
/*fun post collapse*/


/*window onload*/
window.onload = function() {
        first.fun();
        second.funn();
    }
    /*window onload*/

/*window onscroll*/
window.onscroll = function() {
        scrollnav()
    }
    /*window onscroll*/

// global fun
scrollnav();
brand("/");
post([...controlspan], [...controlpost]);
post([...controlspanthird], [...controlpostthird]);
post([...controlspanfourty], [...controlpostfourty]);
post([...controlspanfifth], [...controlpostfifth]);
$(".menu").click(function() {
    $(".navb").toggleClass("active")
    $(".navb").slideToggle(400)
});
// global fun