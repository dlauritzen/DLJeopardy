function makeTimer(func, delay) {
	func();
	setTimeout("makeTimer(" + func + ", " + delay + ")", delay);
}

