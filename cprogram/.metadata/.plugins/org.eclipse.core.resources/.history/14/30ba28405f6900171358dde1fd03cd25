#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

#define DEBUG 1
#ifdef DEBUG
#define PR  printf
#else
#define PR(...)
#endif

typedef struct _binary_tree {
	int data;
	struct _binary_tree * left;
	struct _binary_tree * right;
}* binary_tree;

typedef struct _QUEUEnode {
	/*
	 * 将 item 定义未指向某种特定数据结构的指针,可以使得程序更有扩展性,
	 * 同时, 程序可以返回指针 NULL 作为异常状态的标识,
	 * 避免 GCC diagnostic return type 检测
	 */
	binary_tree item;
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

// QUEUE is already a pointer, should not use unary '*'
void ENQUEUE(QUEUE queue, binary_tree item) {
	// 两次传入的 item 都不为null, 为什么第二次输出的数是 NULL 呢? 实在不太明白
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
		queue->count = 1;
	} else if (NULL == queue->head) {
		printf("error\n");
		exit(EXIT_FAILURE);
	} else if (NULL == queue->tail) {
		printf("error\n");
		exit(EXIT_FAILURE);
	} else {
		queue->tail->next = node;
		queue->tail = node;
		queue->count++;
	}
//	PR("#73:%p\n",queue->head);
}

binary_tree DEQUEUE(QUEUE queue) {
//  first in, frist out ,remove from head
//	[Controlling compiler diagnostic messages with pragmas](http://infocenter.arm.com/help/index.jsp?topic=/com.arm.doc.dui0472m/chr1359124244797.html)
//  push pop 要覆盖一个作用域范围,在一个作用域内部是不起作用的
	if (NULL == queue->head) {
		return NULL;
	}
	// @TODO 真是抓狂啊,由于出队列的这个破 bug, 折腾了整整一天,都还以自我了
	if (1 == queue->count) {
		QUEUEnode node = queue->tail;
		queue->tail = queue->head = NULL;
		binary_tree item = node->item;
		queue->count = 0;
		free(node);
		return item;
	}
	QUEUEnode node = queue->head;
	binary_tree item = node->item;
	queue->head = queue->head->next;
	free(node);
	queue->count--;
	return item;
}

// 接下来我们需要把数据插入到对应的位置上；我们希望树左边分支的的数据总是比树右边分支的要小；
// try indirect pointer to change value
void binary_tree_insert(binary_tree *tree, int val) {
	binary_tree temp = NULL;
	// if it is the first node to be insert
	if (NULL == *tree) {
		temp = (binary_tree) malloc(sizeof(*temp));
		if (NULL == temp) {
			printf("not sufficient memory!\n");
			exit(EXIT_FAILURE);
		}
		temp->left = temp->right = NULL;
		temp->data = val;
		*tree = temp;
		return;
	}
	if (val < (*tree)->data) {
		binary_tree_insert(&(*tree)->left, val);
	} else if (val > (*tree)->data) {
		binary_tree_insert(&(*tree)->right, val);
	} else {
		return;
	}
}

/**
 * 遍历的时候,需要先删除左右节点,才能释放该节点,
 * 从跟节点,依次遍历销毁所有节点
 */
void deltree(binary_tree tree) {
	if (NULL != tree) {
		deltree(tree->left);
		deltree(tree->right);
//直接释放啦free就只是释放啦根节点；
		PR("free node:%d\n", tree->data);
		free(tree);
	}
}

void print_preorder_internal(binary_tree tree) {
	if (tree) {
		printf("%d, ", tree->data);
		print_preorder_internal(tree->left);
		print_preorder_internal(tree->right);
	}
}

void print_preorder(binary_tree tree) {
	printf("[ ");
	print_preorder_internal(tree);
	printf(" ]\n");
}

void print_inorder_internal(binary_tree tree) {
	if (NULL != tree) {
		print_inorder_internal(tree->left);
		printf("%d, ", tree->data);
		print_inorder_internal(tree->right);
	}
}

void print_inorder(binary_tree tree) {
	printf("[ ");
	print_inorder_internal(tree);
	printf(" ]\n");
}

void print_postorder_internal(binary_tree tree) {
	if (NULL != tree) {
		print_postorder_internal(tree->left);
		print_postorder_internal(tree->right);
		printf("%d, ", tree->data);
	}
}

void print_postorder(binary_tree tree) {
	printf("[ ");
	print_postorder_internal(tree);
	printf(" ]\n");
}

void travel(QUEUE queue) {
	if (NULL == queue->head)
		return;
	QUEUEnode visitor = queue->head;
	printf("[ ");
	for (int i = 0; i < queue->count; i++) {
		// visitor->item is a pointer to Item
		printf("%d, ", visitor->item->data);
		visitor = visitor->next;
	}
	printf(" ]\n");
}

/**
 * 层需遍历: 自上而下,自左向右
 先将树的根节点入队，
 如果队列不空，则进入循环
 {
 将队首元素出队，并输出它；
 如果该队首元素有左孩子，则将其左孩子入队；
 如果该队首元素有右孩子，则将其右孩子入队
 }
 */
void print_levelorder_internal(binary_tree tree) {
	binary_tree t = tree;
	QUEUE queue = QUEUEinit();
	ENQUEUE(queue, t);
	while (queue->count > 0) {
		t = DEQUEUE(queue);
		printf("%d, ",t->data);
		if (NULL != t->left) {
			ENQUEUE(queue, t->left);
		}
		if (NULL != t->right) {
			ENQUEUE(queue, t->right);
		}
	}
}

void print_levelorder(binary_tree tree) {
	printf("[ ");
	print_levelorder_internal(tree);
	printf(" ]\n");
}

int main(int argc, char ** argv) {
	// 一级指针
	binary_tree root = NULL;
	// 二级指针,目的是通过二级指针,改变变量的值,而不许要返回值
	// t 指向 root 的地址
	binary_tree *t = &root;
	binary_tree_insert(t, 9);
	binary_tree_insert(t, 4);
	binary_tree_insert(t, 15);
	binary_tree_insert(t, 6);
	binary_tree_insert(t, 12);
	binary_tree_insert(t, 17);
	binary_tree_insert(t, 2);

	printf("level Order Display\n");
	print_levelorder(root);

	printf("Pre Order Display\n");
	print_preorder(root);
	printf("In Order Display\n");
	print_inorder(root);

	printf("Post Order Display\n");
	print_postorder(root);

	/* Deleting all nodes of tree */
	deltree(root);
}
