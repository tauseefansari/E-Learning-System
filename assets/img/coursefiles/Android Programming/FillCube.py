def findMaximum(array, n):
    maxColumn = float('-inf')
    for i in range(n):
        countRes = 0
        for j in range(n):
            if array[j][i] == 'C':
                countRes += 1
        maxColumn = max(countRes, maxColumn)
    return maxColumn

def rotate90(A):
    n = len(A[0])
    for i in range(n // 2):
        for j in range(i, n - i - 1):
            temp = A[i][j]
            A[i][j] = A[n - 1 - j][i]
            A[n - 1 - j][i] = A[n - 1 - i][n - 1 - j]
            A[n - 1 - i][n - 1 - j] = A[j][n - 1 - i]
            A[j][n - 1 - i] = temp

rc = int(input())
matrix = []
res = 0
for user in range(rc):
    matrix.append(list(map(str, input().rstrip().split())))
for stores in range(4):
    rotate90(matrix)
    res = max(res, findMaximum(matrix, rc))
print(res)
