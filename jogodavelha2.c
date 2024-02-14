#include <stdio.h>
#include <stdlib.h>

/*
    |   |
   -------
    |   |
   -------
    |   |

*/

int main(){
//estrutura de dados?
int l, c, linha, coluna, jogador = 1;
char jogo [3][3];



// como inicializar nossa estrutura de dados?
 for(l = 0; l < 3; l++){
    for(c = 0; c < 3; c++){
            jogo[l][c] = ' ';


    }
 }
//imprimir jogo
printf("\n\n\t 0   1   2\n\n");
for(l = 0; l < 3; l++){
    for(c = 0; c < 3; c++){
            if(c == 0)
            printf("\t");
        printf(" %c ", jogo[l][c]);
        if(c < 2)
            printf("|");
            if(c == 2)
                printf("  %d", l);
    }
    if(l < 2)
    printf("\n\t-----------");
    printf("\n");
}}

//ler coordenadas
do{
printf("digite a linha e a coluna que deseja jogar:");
scanf("%d%d", &linha, &coluna);
}while(linha < 0 || linha > 2 || coluna < 0 || coluna > 2 || jogo[linha][coluna] != ' ');


//salvar coordenadas
if(jogador == 1){
jogo[linha][coluna] = '0'
jogador++;
}
else{
    jogo[linha][coluna] = 'X';
    jogador = 1;
}

// alguem ganhou por linha
if(jogo[0][0] == '0' && jogo[0][1] == '0' && jogo[0][2] == '0' ||
  jogo[1][0] == '0' && jogo[1][1] == '0' && jogo[01][2] == '0' ||
  jogo[2][0] == '0' && jogo[2][1] == '0' && jogo[2][2] == '0'){
    printf("|nParabens! O jogador 1 venceu por linha!\n");
  }

  if(jogo[0][0] == 'X' && jogo[0][1] == 'X' && jogo[0][2] == 'X' ||
  jogo[1][0] == 'X' && jogo[1][1] == 'X' && jogo[01][2] == 'X' ||
  jogo[2][0] == 'X' && jogo[2][1] == 'X' && jogo[2][2] == 'X'){
    printf("|nParabens! O jogador 2 venceu por linha!\n");
  }


// alguem ganhou por coluna
if(jogo[0][0] == '0' && jogo[1][0] == '0' && jogo[2][0] == '0' ||
   jogo[0][1] == '0' && jogo[1][0] == '0' && jogo[2][1] == '0' ||
    jogo[0][2] == '0' && jogo[1][2] == '0' && jogo[2][2] == '0' ||){
         printf("\nParabens! O jogador 1 venceu por coluna!\n");
    }

    if(jogo[0][0] == 'X' && jogo[1][0] == 'X' && jogo[2][0] == 'X' ||
   jogo[0][1] == 'X' && jogo[1][0] == 'X' && jogo[2][1] == 'X' ||
    jogo[0][2] == 'X' && jogo[1][2] == 'X' && jogo[2][2] == 'X' ||){
         printf("\nParabens! O jogador 2 venceu por coluna!\n");
    }

// alguem ganhou por diagonal principal
if(jogo[0][0] == '0' && jogo[1][1] == '0' && jogo[2][2] == '0'){
      printf("|nParabens! O jogador 1 venceu na diag. principal!\n");
}
if(jogo[0][0] == 'X' && jogo[1][1] == 'X' && jogo[2][2] == 'X'){
      printf("|nParabens! O jogador 2 venceu na diag. principal!\n");
}

// alguem ganhou por diagonal secundaria






