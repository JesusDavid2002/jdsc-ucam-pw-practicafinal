const canvas = document.getElementById('logoCanvas');
const ctx = canvas.getContext('2d');

// Dibujar el texto del título
ctx.font = 'bold 23px Cursive';
ctx.fillStyle = 'rgb(53, 42, 42);'; // Color naranja
ctx.fillText('Mercería La Ilusión', 105, 70);

 // Dibujar el botón trasero en diagonal
ctx.beginPath();
ctx.arc(70, 50, 20, 0, Math.PI * 2); // Posición diagonal
ctx.fillStyle =  '#A52A2A'; // Color gris claro 
ctx.strokeStyle = '#000000'; // Color del borde
ctx.lineWidth = 2; // Grosor del borde
ctx.stroke();
ctx.fill();

ctx.beginPath();
ctx.arc(60, 40, 3, 0, Math.PI * 2); // Agujero superior izquierdo
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

ctx.beginPath();
ctx.arc(80, 40, 3, 0, Math.PI * 2); //  Agujero superior derecho
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

ctx.beginPath();
ctx.arc(80, 60, 3, 0, Math.PI * 2); // Agujero inferior derecho
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

// ctx.beginPath();
// ctx.arc(70, 50, 3, 0, Math.PI * 2);  // Agujero central
// ctx.fillStyle = '#FFFFFF'; // Color blanco
// ctx.fill();

// Dibujar el botón
ctx.beginPath();
ctx.arc(50, 70, 20, 0, Math.PI * 2);
ctx.fillStyle = '#A52A2A'; // Color marrón 
ctx.strokeStyle = '#000000'; // Color del borde
ctx.lineWidth = 2; // Grosor del borde
ctx.stroke();
ctx.fill();

// Dibujar los agujeros del botón trasero
ctx.beginPath();
ctx.arc(40, 60, 3, 0, Math.PI * 2); // Agujero superior izquierdo
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

ctx.beginPath();
ctx.arc(60, 60, 3, 0, Math.PI * 2); // Agujero superior derecho
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

// ctx.beginPath();
// ctx.arc(50, 70, 3, 0, Math.PI * 2); // Agujero central
// ctx.fillStyle = '#FFFFFF'; // Color blanco
// ctx.fill();

ctx.beginPath();
ctx.arc(60, 80, 3, 0, Math.PI * 2); // Agujero inferior derecho
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();

ctx.beginPath();
ctx.arc(40, 80, 3, 0, Math.PI * 2); // Agujero inferior izquierdo
ctx.fillStyle = '#FFFFFF'; // Color blanco
ctx.fill();
