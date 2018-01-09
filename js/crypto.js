/*jshint esversion: 6 */

async function decrypt(pass, cypherText, iv) {
	//alert(cypherText);
	pass = pass.substring(0, pass.length/2); // assumes pass is 256 bits 

	var key = await window.crypto.subtle.importKey("raw", stringToArrayBuffer(pass), {name: "AES-GCM"}, true, ["encrypt", "decrypt"]);
	//alert(key);
	var algorithm = key.algorithm;
	algorithm.iv = iv;

	cypherText = stringToArrayBuffer(cypherText);
	//alert("CT: "+cypherText);
	var pt = await window.crypto.subtle.decrypt(algorithm, key, cypherText);
	return pt = arrayBufferToString(new Uint8Array(pt));
}

// return encrypted string
async function encrypt(pass, plainStr, iv) {
	var crypto = window.crypto || window.msCrypto;
	
	pass = pass.substring(0, pass.length/2); // assumes pass is 256 bits 
		
	var key = await crypto.subtle.importKey("raw", stringToArrayBuffer(pass), {name: "AES-GCM"}, true, ["encrypt", "decrypt"]);

	var algorithm = key.algorithm;
	algorithm.iv = iv;

	var plain = stringToArrayBuffer(plainStr);
	const buffer = await crypto.subtle.encrypt(algorithm, key, plain);

	ct = arrayBufferToString(new Uint8Array(buffer));
	return ct;
}


function generateIV() {
	return window.crypto.getRandomValues(new Uint8Array(16));
}

/*
	Calculates the SHA-256 hash of a string

	Params:
	- str (String): the string to be hashed
	- onFinish (Function): a function that takes a hash (hex string) as a parameter 
	that gets called when the hash is calculated
*/
function hashStr(str, onFinish) {
	var crypto = window.crypto || window.msCrypto;

	if(crypto.subtle)
	{	    
	    var promise = crypto.subtle.digest({name: "SHA-256"}, stringToArrayBuffer(str));   

	    var hash_value;
	    promise.then(function(result){
	        hash_value = arrayBufferToHex(result);
	        onFinish(hash_value);
	    });
	}
	else
	{
	    throw "Cryptography API not Supported";
	}
}

function hashPBKD(str, onFinish) {
	var crypto = window.crypto || window.msCrypto;

	if(crypto.subtle)
	{	    
	    window.crypto.subtle.importKey(
		    "raw",
		    stringToArrayBuffer(str),
		    {
		        name: "PBKDF2",
		    },
		    false,
		    ["deriveKey", "deriveBits"] 
		).then(function(key){
		    hash_value = arrayBufferToHex(key);
	        onFinish(hash_value);
		});
	}
	else
	{
	    throw "Cryptography API not Supported";
	}
}

// helper methods
function stringToArrayBuffer(str)
{
    var bytes = new Uint8Array(str.length);
    for (var iii = 0; iii < str.length; iii++) 
    {
        bytes[iii] = str.charCodeAt(iii);
    }

    return bytes;
}

function hexToBytes(hex) {
    for (var bytes = [], c = 0; c < hex.length; c += 2) {
    	//////alert((parseInt(hex.substr(c, 2), 16));
    	bytes.push(parseInt(hex.substr(c, 2), 16));
	}
	return new Uint8Array(bytes);
}

function arrayBufferPad(buffer) {
	if (buffer.byteLength > 16) {
		return buffer.subarray(0, 16);
	} else {
		var padded = new Uint8Array(16);
		padded.set(buffer);
		return padded;
	}
}

function arrayBufferToString(buffer)
{
    var str = "";
    for (var iii = 0; iii < buffer.byteLength; iii++) 
    {
        str += String.fromCharCode(buffer[iii]);
    }

    return str;
}

function arrayBufferToHex(buffer) 
{
    var data_view = new DataView(buffer);
    var iii, len, hex = '', c;

    for(iii = 0, len = data_view.byteLength; iii < len; iii += 1) 
    {
        c = data_view.getUint8(iii).toString(16);
        if(c.length < 2) 
        {
            c = '0' + c;
        }
    
        hex += c;
    }

    return hex;
}

