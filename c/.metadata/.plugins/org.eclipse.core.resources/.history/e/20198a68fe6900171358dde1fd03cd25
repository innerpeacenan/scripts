#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>

/**
 * @param char delimiter
 * @return a array of strings
 */
char** explode(char delimiter, char* str) {
	int l = strlen(str);
	int i = 0;
	int j = 0;
	int k = 0;
	char x;
	char** r = (char**) malloc(sizeof(char**));
	r[0] = (char*) malloc(l * sizeof(char));
	while (i < l + 1) {
		x = str[i++];
		if (x == delimiter || x == '\0') {
			// c 语言字符串中间不让有 '\0'
			printf("add 0 to r[%d][%d]\n", j, k);
			r[j][k] = '\0';
			r[j] = (char*) realloc(r[j], k * sizeof(char));
			k = 0;
			r = (char**) realloc(r, (++j + 1) * sizeof(char**));
			r[j] = (char*) malloc(l * sizeof(char));
		} else {
			printf("copying %c to r[%d][%d]\n", x, j, k);
			r[j][k++] = x;

		}
	}
	return r;
}

int main() {
	char str[] = "hello world , I am learning c program, It's great! ,汉,字,一个汉字占据三个字符";
	int length = strlen(str);
	char ** r = (char **) malloc (sizeof(char **));
	r = explode(',', str);
	int i = 0;
	int j = 0;

	printf("[");
	while (i < length) {
		// 换一种死路,只要不是第一个元素,就输出 ','
		if(j > 0){
			printf(", ");
		}
		printf("'%s'", r[j]);
		i += (int) strlen(r[j]) + 1;
		j++;
	}
	printf("]\n");
}
