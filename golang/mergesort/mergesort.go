package main

import (
	"algorithum/golang/utility"
	"fmt"
)

func main() {
	fmt.Printf("Enter the size of the array\n")
	var size int
	fmt.Scanf("%d ", &size)
	arr := make([]string, size)
	fmt.Printf("Enter the string array elements\n")
	for i := range arr {
		fmt.Scanf("%s", &arr[i])
	}
	utility.MergeSort(arr, 0, len(arr)-1)
	fmt.Print(arr)
}
