//a stack implement by single linked list
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <assert.h>


typedef struct _QUEUEnode {
	/*
	 * 将 item 定义未指向某种特定数据结构的指针,可以使得程序更有扩展性,
	 * 同时, 程序可以返回指针 NULL 作为异常状态的标识,
	 * 避免 GCC diagnostic return type 检测
	 */
	int item;
	struct _QUEUEnode * next;
// should be pointer, use unary ‘*’
}* QUEUEnode;

typedef struct _QUEUE {
	QUEUEnode head;
	QUEUEnode tail;
	int count;
}* QUEUE;

QUEUE QUEUEinit() {
	QUEUE queue = malloc(sizeof(*queue));
	if (NULL == queue) {
		fprintf(stderr, "not sufficeint memory!\n");
		exit(EXIT_FAILURE);
	}
	// incompatible types when assigning to type ‘QUEUEnode {aka struct _QUEUEnode}’ from type ‘void *’
	queue->head = NULL;
	queue->tail = NULL;
	queue->count = 0;
	return queue;
}

// QUEUE is already a ponter, should not use unary '*'
void ENQUEUE(QUEUE queue, int item) {
	QUEUEnode node = (QUEUEnode) malloc(sizeof(*node));
	if (NULL == node) {
		fprintf(stderr, "not sufficeint memory!\n");
		exit(EXIT_FAILURE);
	}
	node->item = item;
	node->next = NULL;
	if ((NULL == queue->head) && (NULL == queue->tail)) {
		queue->head = node;
		queue->tail = node;
		// tail 部分又会加
		queue->count = 1;
	} else {
		queue->tail->next = node;
		queue->tail = node;
		queue->count++;
	}

}

int DEQUEUE(QUEUE queue) {
//  first in, frist out ,remove from head
//	[Controlling compiler diagnostic messages with pragmas](http://infocenter.arm.com/help/index.jsp?topic=/com.arm.doc.dui0472m/chr1359124244797.html)
//  push pop 要覆盖一个作用域范围,在一个作用域内部是不起作用的
	if (NULL == queue->head) {
		return -1;
	}
	QUEUEnode node = queue->head;
	int item = node->item;
	queue->head = queue->head->next;
	free(node);
	queue->count--;
	return item;
}

void travel(QUEUE queue) {
	if (NULL == queue->head)
		return;
	QUEUEnode visitor = queue->head;
	printf("[ ");
	for (int i = 0; i < queue->count; i++) {
		// visitor->item is a pointer to Item
		printf("%d, ", visitor->item);
		visitor = visitor->next;
	}
	printf(" ]\n");
}

/**
 * 二级指针智能修改一级指针值存在的情况下指针的内容而不许要返回值(也就是引用修改值)
 * 因此, STACKinit 初始化需要需要返回值
 */
int main(int argc, char **argv) {
	QUEUE queue = QUEUEinit();
	int item;
	for (int i = 1; i < argc; i++) {
		float num = atof(argv[i]);
		ENQUEUE(queue, num);
	}
	travel(queue);
	for (int i = 1; i < argc; i++) {
		printf("%d\n", DEQUEUE(queue));
	}
}

