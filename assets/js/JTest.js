class Crossword{
    constructor(words){
        this.filas=1;
        this.columnas=1;
        this.grid=[[' ']];
        this.words=words;
        this.words=this.shuffle(this.words);
    }
    addW(word){
        let dir=Math.floor(Math.random() * 2);
        if(dir==0){
            if(e){}
        }
        else{

        }
    }
    search(word,dir,x,y){
        switch(dir){
            case 0: //derecha
                x+=2;
                if(x>=columnas) return;
                let L;
                while(L=this.getLet(x,y)){
                    let y1 = y + 1, //abajo
                        y2 = y - 1; //arriba
                    if(this.getLet(x,y1)){
                        this.search(word,2,x,y1);
                    }
                    else if(this.getLet(x,y2)){
                        this.search(word,1,x,y2);
                    }
                    else{
                        puede:
                        for(let i=0;i<word.length;i++){
                            if(L==word[i]){
                                for(let antes=i;antes>=0;antes--){
                                    if(!this.isCan(x,y-antes)) break puede;

                                }
                                for(let despues=i;despues<word.length;despues++){
                                    if(!this.isCan(x,y+despues)) break puede;
                                }
                                for(let antes=i;antes>=0;antes--){
                                    if()
                                }
                                for(let despues=i;despues<word.length;despues++){
                                    if(!this.isCan()) break puede;
                                }
                            }
                        }
                    }
                }
                
                break;
            case 1: //arriba

                break;
            case 2: //abajo

                break;
        }
    }
    getLet(x,y){
        if(x<0 ||x>=columnas)return false;
        if(y<0 ||y>=filas)return false;
        return this.grid[x][y]!=''?this.grid[x][y]:false;
    }
    isCan(x,y){
        if(x<0 ||x>=columnas)return true;
        if(y<0 ||y>=filas)return true;
        return this.grid[x][y]=='';
    }
    shuffle(words){
        let index=words.length;
        for(let i=0;i<index;i++){
            let rand=Math.floor(Math.random() * index);
            let temp=words[i];
            words[i]=words[rand];
            words[rand]=temp;
        }
        return words;
    }
    addCoL(cant){

        for(let i=0;i<this.filas;i++){
            this.grid[i].unshift(' ');
        }
        this.columnas++;
    }
    addCoR(){
        for(let i=0;i<this.filas;i++){
            this.grid[i].push(' ');
        }
        this.columnas++;
    }
    addLiT(){
        let nuevo=[];
        for(let i=0;i<this.columnas;i++)
            nuevo.push(' ');
        this.filas=this.grid.unshift(nuevo);
    }
    addLiB(){
        let nuevo=[];
        for(let i=0;i<this.columnas;i++)
            nuevo.push(' ');
        this.filas=this.grid.push(nuevo);
    }
}







/*------------------------------ PARA CORRER ------------------------------*/
let tabla=new Crossword(["A","B","C","D","E","F","G"])
console.log(tabla)
console.table(tabla.grid);