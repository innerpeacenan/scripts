#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

#define DEBUG 1
#ifdef DEBUG
#define PR  printf
#else
#define PR(...)
#endif

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>

/**
 * @param char delimiter
 * @return a array of strings
 */
char* explode(char* delimiter, char* str) {
	int l = strlen(str);
	int i = 0;
	int j = 0;
	int k = 0;
	char x;
	// 构造变长字符串数组
	char * r = (char *) malloc(sizeof(*r));
	int sublen = strlen(delimiter);
	while (i < l) {
		for (j = 0; j < sublen; j++) {
			if (delimiter[j] != str[i + j]) {
				break;
			}
		}
		if (j == sublen) {
			for (int k = 0; k < sublen; k++) {
				str[i + k] = '\0';
			}
		}
		i = i + j + 1;
//		PR("comparing with:%c\n", str[i]);
	};
	return str;
}

int main() {
	char str[] =
			"hello world , I am ,learning c program, It's great!, 一个汉字, 占据三个字节,一个字节是8位";
	int length = strlen(str);
	char * r = (char *) malloc(sizeof(*r));
	r = explode(",", str);
// 接下来自己动手实现不连续的以为数组的实现方式
	int i = 0;
	printf("[");
	while (i < length) {
		// 换一种死路,只要不是第一个元素,就输出 ','
		if (i > 0) {
			printf(", ");
		}
		printf("'%s'", r + i);
		// 想想这里怎么处理
		i += (int) strlen(r + i) + 1;
		while ('\0' == str[i]) {
			printf("%d\n", i);
			i++;
		}
	}
	printf("]\n");
}

