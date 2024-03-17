function changeImg(imgNumber) {
	var myImages = ["background/0001.jpg", "background/0002.jpg", "background/0003.jpg", "background/0004.jpg", "background/0005.jpg", "background/0006.jpg", "background/0007.jpg", "background/0008.jpg","background/0009.jpg", "background/0010.jpg", "background/0011.jpg", "background/0012.jpg", "background/0013.jpg", "background/0014.jpg", "background/0015.jpg", "background/0016.jpg", "background/0017.jpg", "background/0018.jpg"]; 
	var imgShown = document.body.style.backgroundImage;
	var newImgNumber =Math.floor(Math.random()*myImages.length);
	document.body.style.backgroundImage = 'url('+myImages[newImgNumber]+')';
}

window.onload=changeImg;