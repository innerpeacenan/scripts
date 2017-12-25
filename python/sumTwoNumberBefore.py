def sumTwoNumberBefore (n):
    if n < 2:
        return 1
    else:
        return sumTwoNumberBefore(n - 1) +  sumTwoNumberBefore(n - 2)

def fib(n):
    f1 = f2 = 1
    for i in range(1,n):
        f1, f2 = f2, f2 + f1
    return f2


if __name__ == '__main__':
    print("1:%s" %(fib(1)))
    print("2:%s" %(fib(2)))
    print("8:%s" %(fib(8)))
