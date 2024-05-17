var playerRood = "R";
var playerGeel = "G";
var currPlayer = playerRood;

var gameOver = false;
var bord;

var rows = 6;
var columns = 7;
var currColumns = []; //houdt bij op welke rij elke kolom zich bevindt.

window.onload = function() {
    setGame();
}

function setGame() {
    bord = [];
    currColumns = [5, 5, 5, 5, 5, 5, 5];

    for (let r = 0; r < rows; r++) {
        let row = [];
        for (let c = 0; c < columns; c++) {
            // JS
            row.push(' ');
            // HTML
            let tile = document.createElement("div");
            tile.id = r.toString() + "-" + c.toString();
            tile.classList.add("tile");
            tile.addEventListener("click", setPiece);
            document.getElementById("bord").append(tile);
        }
        bord.push(row);
    }
}

function setPiece() {
    if (gameOver) {
        return;
    }

    // verkrijg de coördinaten van de geklikte tegel
    let coords = this.id.split("-");
    let r = parseInt(coords[0]);
    let c = parseInt(coords[1]);

    // bepaal op welke rij de huidige kolom moet worden geplaatst
    r = currColumns[c]; 

    if (r < 0) { // bord[r][c] != ' '
        return;
    }

    bord[r][c] = currPlayer; // update JS bord
    let tile = document.getElementById(r.toString() + "-" + c.toString());
    if (currPlayer == playerRood) {
        tile.classList.add("rood-stuk");
        currPlayer = playerGeel;
    }
    else {
        tile.classList.add("geel-stuk");
        currPlayer = playerRood;
    }

    r -= 1; // update de hoogte van de rij voor die kolom
    currColumns[c] = r; // update de array

    checkWinnaar();
}

function checkWinnaar() {
    // horizontaal
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns - 3; c++){
            if (bord[r][c] != ' ') {
                if (bord[r][c] == bord[r][c+1] && bord[r][c+1] == bord[r][c+2] && bord[r][c+2] == bord[r][c+3]) {
                    setWinnaar(r, c);
                    return;
                }
            }
        }
    }

    // verticaal
    for (let c = 0; c < columns; c++) {
        for (let r = 0; r < rows - 3; r++) {
            if (bord[r][c] != ' ') {
                if (bord[r][c] == bord[r+1][c] && bord[r+1][c] == bord[r+2][c] && bord[r+2][c] == bord[r+3][c]) {
                    setWinnaar(r, c);
                    return;
                }
            }
        }
    }

    // anti-diagonaal
    for (let r = 0; r < rows - 3; r++) {
        for (let c = 0; c < columns - 3; c++) {
            if (bord[r][c] != ' ') {
                if (bord[r][c] == bord[r+1][c+1] && bord[r+1][c+1] == bord[r+2][c+2] && bord[r+2][c+2] == bord[r+3][c+3]) {
                    setWinnaar(r, c);
                    return;
                }
            }
        }
    }

    // diagonaal
    for (let r = 3; r < rows; r++) {
        for (let c = 0; c < columns - 3; c++) {
            if (bord[r][c] != ' ') {
                if (bord[r][c] == bord[r-1][c+1] && bord[r-1][c+1] == bord[r-2][c+2] && bord[r-2][c+2] == bord[r-3][c+3]) {
                    setWinnaar(r, c);
                    return;
                }
            }
        }
    }
}

function setWinnaar(r, c) {
    let winnaar = document.getElementById("winnaar");
    if (bord[r][c] == playerRood) {
        winnaar.innerText = "Rood heeft gewonnen";             
    } else {
        winnaar.innerText = "Geel heeft gewonnen"; // Veranderd naar Geel
    }
    gameOver = true;
}
