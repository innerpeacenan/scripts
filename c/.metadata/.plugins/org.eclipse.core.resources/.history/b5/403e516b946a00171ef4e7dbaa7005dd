#include <stdio.h>
#include <stdlib.h>

int throw_coin_show_head() {
	return rand() < RAND_MAX / 2;
}

/**
 * 抛硬币实验
 * 第一个参数是单次实验规模N,第二个参数是实验规模M,也即实验次数
 */
int main(int argc, char **argv) {
	if (argc < 3) {
		printf("argument 1 as N: the total coins!\n"
				"argument 2 as M: the time of the experiment!\n");
		exit(EXIT_FAILURE);
	}
	int N = atoi(argv[1]);
	int M = atoi(argv[2]);

	// initiate the array
	int i, j, count;
	int *a = (int *) malloc((N + 1) * sizeof(int));
//	没实验前,M次实验种,出现i次正面朝上情况
	for (i = 0; i <= N; i++) {
		a[i] = 0;
	}

	for (j = 0; j < M; j++) {
		for (count = 0, i = 0; i < N; i++) {
			if (throw_coin_show_head()) {
				count++;
			}
		}
		// 每次循环结束,统计正面向上的次数,写成这样死路清晰
		a[count]++;
	}

	/*
	 * 显示概率分布图,纵坐标未出现y次正面向上(y<=N),横坐标表示在M次实验种,出现y次正面朝上的实验次数x(x<=M)
	 */
	for (i = 0; i <= N; i++) {
		// 两位数字对其,使得单次实验在两位数以内的纵坐标看起来更规整
		printf("%2d", i);
		for (j = 0; j < a[i]; j = j + 10) {
			printf("*");
		}
		printf("\n");
	}
	return 0;
}
