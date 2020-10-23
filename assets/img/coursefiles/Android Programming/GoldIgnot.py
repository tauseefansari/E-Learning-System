mod=1000000007
items=[]
sums=0
res=0
maxVol=0
stack = []
n=int(input())
b,h=map(int, input().split())
for i in range(n):
    items.append(int(input()))
    sums += items[i]
for i in range(n):
    while (not (stack==[]) and items[i]<=items[-1]):
        top=items[-1]
        stack.pop()
        res=items[top]*(stack==[]?i:(i-items[-1]))
        maxVol=max(res%mod,res)
    stack.append(i)
    while not (stack==[]):
        top=items[-1]
        stack.pop()
        res=items[top]*(stack==[]?i:(i-items[-1]-1))
    print(((sums%mod-sums%mod)%m*b%mod*h%mod)%mod)
    """x=1
    k=i+1
    j=i-1
    while (j>=0 and items[j]>items[i]):
        j-=1
        x+=1
    while (k<n and items[k]>items[i]):
        k+=1
        x+=1
    vol = x*items[i]
    if vol>maxVol:
        maxVol = vol
    maxVol = b*h*maxVol
    sums = sums*b*h
    print(((sums%mod-maxVol%mod)%mod*b%mod*h%mod)%mod)"""
