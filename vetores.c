#include <stdio.h>
#define MAX 10

int main(){

int vetor[MAX];
int tam=0, i, valor;

printf("valor");
scanf("%d", &valor);
while (valor != 0){
    vetor[tam] = valor;
    tam++;

}   printf("valor");    scanf("%d, &valor");

printf("tam %d", tam);

for (i=0; i<MAX; i++){
printf("%d", vetor[i]);
}
printf("n");

for (i=tam-1; i>=0 ;i--);
}


