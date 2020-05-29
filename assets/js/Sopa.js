function poner($palabras) {
    let board;    //tablero para colocar las palabras
    let cant;     //cantidad de espacios por lado  
    let words= [    //palabras a colocar
        "SUPERFICIALES",
        "DIMENSIONALES",
        "ANGULARES",
        "LINEALES",
    ];
    words = words.sort((a, b) => b.length - a.length);    //las ordeno de mayor a menor las palabras
    cant = words[0].length + 2;    //el tamaño del board sera 2+ la palabra más larga
    board = [];
    board.length = cant;
    for (let i = 0; i < cant; i++) {    //llenado de espacios vacios el board
        board[i] = [];
        for (let j = 0; j < cant; j++) {
            board[i][j] = "";
        }
    }
    let donde = Math.floor(Math.random() * cant);    //para colocar la primera palabra se coloca en un borde 
    let vh = Math.floor(Math.random() * 2);            //con un random de donde colocarlo y en qué dirección
    for (let i = 0; i < words[0].length; i++) {        //colocar la palabra
        let letra = words[0].charAt(i);
        if (vh == 0) {
            board[i][donde] = letra;
        }
        else {
            board[donde][i] = letra;
        }
    }
    pal: for (let i = 1; i < words.length; i++) {    //iterador de cada palabra
        let palabra = words[i];                        //la palabra
        next: do {
            let x = Math.floor(Math.random() * cant);    //colocar en una posicion random
            let y = Math.floor(Math.random() * cant);
            let dir = Math.floor(Math.random() * 2);     //colocar en una dirección random horizontal o vertical
            let putX = 0, putY = 0, putDir = 0;        //variables de donde se va a colocar
            let puesto = false;                //si fue puesta la palabra para que no busque más donde ponerla
            if (dir == 0) {                //verifica en que posicion salio
                for (let j = 0; j < palabra.length; j++) {
                    if (y + j < cant) {    //si la palabra se salta a afuera del tablero saltar a siguiente espacio
                        if (board[x][y + j] != "" && board[x][y + j] != palabra.charAt(j))//verifica si es un espacio vacio y si no verifica si es la misma letra
                            break;    //de no cumplir salta al siguiente espacio
                    }
                    else
                        break;
                    if (j == palabra.length - 1) {//si el lugar es adecuado se toma su posicion y su dirección
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 0;
                    }
                }
                for (let j = 0; !puesto && j < palabra.length; j++) {//lo mismo que el anterior pero si no logro hacerlo en una dirección se toma la otra
                    if (x + j < cant) {
                        if (board[x + j][y] != "" && board[x + j][y] != palabra.charAt(j))
                            continue next;
                    }
                    else
                        continue next;
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 1;
                    }
                }
            }
            else {
                for (let j = 0; j < palabra.length; j++) {     //lo mismo que el paso anterior pero prueba con las direcciones inversas si primero probo vertical y luego horizontal
                    if (x + j < cant) {                        //ahora va a probar horizontal y luego vertical
                        if (board[x + j][y] != "" && board[x + j][y] != palabra.charAt(j))
                            break;
                    }
                    else
                        break;
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 1;
                    }
                }
                for (let j = 0; !puesto && j < palabra.length; j++) {
                    if (y + j < cant) {
                        if (board[x][y + j] != "" && board[x][y + j] != palabra.charAt(j))
                            continue next;
                    }
                    else
                        continue next;
                    if (j == palabra.length - 1) {
                        puesto = true;
                        putX = x;
                        putY = y;
                        putDir = 0;
                    }
                }
            }
            for (let j = 0; j < palabra.length; j++) {        //si la palabra es candidata a colocarse entonces se toma la dirección
                if (putDir == 0) {    //horizontal
                    board[putX][putY + j] = palabra.charAt(j); //colocar letra por letra horizontalmente
                }
                else {                //vertical
                    board[putX + j][putY] = palabra.charAt(j); //colocar verticalmente
                }
            }
            i++;//contabilizador de iteraciones
            continue pal;//continuar con la siguiente palabra
        } while (i < cant * cant);//para que el ciclo no se vuelva infinito se probara con la misma cantidad que el area del tablero
    }
    return board;//cuando haya terminado se retornara el tablero
}
console.log((poner()));