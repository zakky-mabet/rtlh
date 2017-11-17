function total() {

	var panjang =  parseInt(document.getElementById('panjang').value);
	var lebar = parseInt(document.getElementById('lebar').value);

	var jumlah = panjang * lebar;

	document.getElementById('luas').value = jumlah;
	}

