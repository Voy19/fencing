/*jshint esversion: 6 */
window.onload = function () {

	let btn = document.querySelector(".btn");
	let menu = document.querySelector(".menu");
	let headWrap = document.querySelector(".head_wrap");
	let headTestWrap = document.querySelector(".head-test_wrap");
	let headTest = document.querySelector("header");
	console.log(headTest);

	window.addEventListener('scroll', function () {
		let scrolled = window.pageYOffset;

		if (headTest.classList.contains("head-test")) {
			if (scrolled > 40) {

				headTestWrap.classList.add('head-test_active');
			} else {
				headTestWrap.classList.remove('head-test_active');
			}
		} else {
			if (scrolled > 40) {
				headWrap.classList.add('head_active');
			} else {
				headWrap.classList.remove('head_active');
			}
		}


	});




	// adaptive menu

	btn.addEventListener("click", function () {
		btn.classList.toggle("active");
		menu.classList.toggle("activeMenu");
	});

	let menuUl = document.querySelector("#ul");

	document.addEventListener("click", function (e) {
		if (btn.classList.contains("active")) {
			console.log("1");

			if (event.target != menuUl || event.target != btn) {
				console.log(2);

				btn.classList.remove("active");
				menu.classList.remove("activeMenu");
			}

		}
	});
};