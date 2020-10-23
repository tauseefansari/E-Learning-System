string=input()
m = {}
n = len(string)
r = [[0 for i in range(n+1)] for i in range(2)]
string = "@" + string + "#"
for j in range(2): 
    rpos = 0 
    r[j][0] = 0
    i = 1
    while i <= n: 
        while string[i - rpos - 1] == string[i + j + rpos]: 
            rpos += 1 
        r[j][i] = rpos 
        k = 1
        while (r[j][i - k] != rpos - k) and (k < rpos): 
            r[j][i+k] = min(r[j][i-k], rpos - k) 
            k += 1
        rpos = max(rpos - k, 0) 
        i += k 
string = string[1:len(string)-1] 
m[string[0]] = 1
for i in range(1,n): 
    for j in range(2): 
        for rpos in range(r[j][i],0,-1): 
            m[string[i - rpos - 1 : i - rpos - 1 + 2 * rpos + j]] = 1
    m[string[i]] = 1
l=[]
for i in m: 
    l.append(i)
l.sort(key=len,reverse=True)
for x in range(3):
    print(l[x])
