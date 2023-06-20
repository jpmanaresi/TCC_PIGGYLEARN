class Calculadora {
    i;
    c;
    txP;
    txSel;
    txCDB;
    

    constructor(i, c, txP, txSel, txCDB) {
        this.i = i;
        this.c = c;
        this.txP = txP;
        this.txSel = txSel;
        this.txCDB = txCDB;
    }

    
    calcularPoup() {
        return this.c*Math.pow((1+((this.txP/12)/100)), this.i);
    }
    calcularSel() {
        return this.c*Math.pow((1+((this.txSel/12)/100)), this.i);
    }
    calcularCDB() {
        return this.c*Math.pow((1+((this.txCDB/12)/100)), this.i);
    }
}