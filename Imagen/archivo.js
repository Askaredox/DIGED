//
const gatete = document.getElementById('gato');
const output = document.getElementById('output');
const map = document.getElementById('billar');

gatete.addEventListener('click', function (e) {
  let ctx;
  if (!this.canvas) {
    this.canvas = document.createElement('canvas');
    this.canvas.width = this.width;
    this.canvas.height = this.height;
    ctx = this.canvas.getContext('2d');
    ctx.drawImage(this, 0, 0, this.width, this.height);
  } else {
    ctx = this.canvas.getContext('2d');
  }
  const pixel = ctx.getImageData(e.offsetX, e.offsetY, 1, 1).data;
  $x = e.offsetX;
  $y = e.offsetY;

  $("#billar").append(' <area id="titulo" class="title" alt="Si clícas aquí irás a la página de inicio del tutorial de html" href="#" shape="circle" coords="' + $x + ',' + $y + ',' + '18"  data-id=50 data-Tema="Compiladores" onclick=hola(1,50)>');



  console.log(e.offsetX);
  console.log(e.offsetY);

  output.innerHTML = 'R: ' + pixel[0] + '<br>G: ' + pixel[1] +
    '<br>B: ' + pixel[2] + '<br>A: ' + pixel[3];
  var hex = rgba2hex(pixel[0], pixel[1], pixel[2], pixel[3]);


  alert(hex)

});
//Covierto Color RGBA a Hexadecimal

function hola($x, $y) {

  alert($x + ',' + $y);

};



