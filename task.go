package main

import (
	"fmt"
	"math/rand"
)

func countConsecutiveDuplicates(arr []int) int {
	count := 0
	lastNumber := 0
	hasLastNumber := false

	for _, number := range arr {
		if hasLastNumber && lastNumber == number {
			count++
		}
		lastNumber = number
		hasLastNumber = true
	}

	return count
}

func generateIntArray(length int, min int, max int) []int {
	arr := make([]int, length)
	for i := range length {
		arr[i] = rand.Intn(max-min+1) + min
	}
	return arr
}

func main() {
	array := generateIntArray(100, -10, 10)
	pairsCount := countConsecutiveDuplicates(array)

	fmt.Printf("Количество последовательных пар одинаковых элементов: %d\n", pairsCount)

	/* 
		length - 10^7
		generateIntArray time               0.115442 секунд
		countConsecutiveDuplicates time     0.007288 секунд
		---------------------------------------------------
		length - 10^8
		generateIntArray time               1.145516 секунд
		countConsecutiveDuplicates time     0.074628 секунд
	*/
}
