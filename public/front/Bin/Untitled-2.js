/*for random number*/
function random(how, express) {
	function ran() {
	let num = Math.floor(Math.random() * express)
	return num
	}
	let set = new Set([ran()]);
	if (set.size === how) {
		return set
	}else{
		function again() {
			for(i = 0; i < 1; i++){
				set.add(ran());
			}
			return (set.size === how) ? set : again()
		}
		again()
	}
	return set
}
/*for random number*/

/*start machine text*/
window.onload = function () {
	let text = document.getElementById("spring"); /*varibales*/
	let pr = document.getElementById("pr");
	let index = "Beautiful Egypt";
	let prtext = "Egypt is home to the oldest civilizations on earth, where its name is derived from the Greek word Aegyptos, and in 5500 BC there were two main kingdoms that stretched over the Nile River, the Egyptian historians called them Upper Egypt, Egypt, and Sefa, 3200 CE. The two kingdoms are under one rule, and one ruler who takes over their affairs is King Narmer who is called Menes, and this marked the beginning of the ancient civilization of Egypt."
	let i = 0;
	let ii = 0;
	let arr = [...random(2,index.length)]
	let [x1,x2] = arr;
	(function ahmed() {
		let nav = document.getElementById("nav");
		let content = document.getElementsByClassName("content");
		let off = nav.offsetTop;
		if(window.pageYOffset >= off){
			nav.classList.add("fixed")
			content[0].style.marginTop = "62px";
		}
	})();

	if (x1 === 9 || x2 === 9) {
		if(x1 === 8 || x2 === 8){
			x1 += 1;
			x2 += 1;
		}else{
			x1 = x1 - 1;
			x2 = x2 - 1;
		}
	}
	let arr2 = [...random(30,prtext.length)]
	let [r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15,r16,r17,r18,r19,r20,r21,r22,r23,r24,r25,r26,r27,r28,r29,r30] = arr2;
	let interval = setInterval(function () {
		if(i === x1 || i === x2){
			let span = document.createElement("span"),
				color = document.createTextNode(index[i]);
			span.appendChild(color);
            text.appendChild(span);
			span.classList.add("one");
			span.style.textTransform = "uppercase";
 		}else{
            text.innerHTML += index[i];
        }
		i++;
		if(i === index.length){
			clearInterval(interval)
		}
	 },100)
	 let interval2 = setInterval(function () {
		if(ii === r1 || ii === r2 || ii === r3 || ii === r4 || ii === r5 || ii === r6 || ii === r7 || ii === r8 || ii === r9 || ii === r10 || ii === r11 || ii === r12 || ii === r13 || ii === r14 || ii === r15 || ii === r16 || ii === r17 || ii === r18 || ii === r19 || ii === r20 || ii === r21 || ii === r22 || ii === r23 || ii === r24 || ii === r25 || ii === r26 || ii === r27 || ii === r28 || ii === r29 || ii === r30){
			let span = document.createElement("span"),
				color = document.createTextNode(prtext[ii]);
			span.appendChild(color);
            pr.appendChild(span);
			span.classList.add("one");
 		}else{
            pr.innerHTML += prtext[ii];
        }
		ii++;
		if(ii === prtext.length){
			clearInterval(interval2)
		}
	 },10)
}
/*end machine text*/

/*start brand*/
let brand = document.getElementById("brand");
brand.onclick = _ => open("index.html","_self")
/*end brand*/

/*start nav*/
let nav = document.getElementById("nav");
let content = document.getElementsByClassName("content");
let off = nav.offsetTop;
window.onscroll= function () {
	if(window.pageYOffset >= off){
        nav.classList.add("fixed")
        content[0].style.marginTop = "63px";
	}else{
		nav.classList.remove("fixed")
		content[0].style.marginTop = "0";
    }
}
$(".menu").click(function () {
	$(".navb").toggleClass("active")
	$(".navb").slideToggle(400)
})
/*end nav*/

/*start post*/
let control = document.querySelectorAll(".second .side span");
let controlthird = document.querySelectorAll(".third .side-third span");
let controlfourty = document.querySelectorAll(".fourty .side-fourty span");
let x = [...control]
let y = [...controlthird]
let z = [...controlfourty]
for(let i of x){
	i.onclick = function () {
		document.querySelector(".second .side span.active").classList.remove("active");
		this.classList.add("active")
		document.querySelector(".second .post.active").classList.remove("active")
		let data = this.getAttribute("data-num");
		setTimeout(() => {
			document.querySelector(`#${data}`).classList.add("active")
		}, 600);
	}
}

for(let ii of y){
	ii.onclick = function () {
		document.querySelector(".third .side-third span.active").classList.remove("active");
		this.classList.add("active")
		document.querySelector(".third .post-third.active").classList.remove("active")
		let data = this.getAttribute("data-num");
		setTimeout(() => {
			document.querySelector(`#${data}`).classList.add("active")
		}, 600);
	}
}

for(let iii of z){
	iii.onclick = function () {
		document.querySelector(".fourty .side-fourty span.active").classList.remove("active");
		this.classList.add("active")
		document.querySelector(".fourty .post-fourty.active").classList.remove("active")
		let data = this.getAttribute("data-num");
		setTimeout(() => {
			document.querySelector(`#${data}`).classList.add("active")
		}, 600);
	}
}

/*end post*/