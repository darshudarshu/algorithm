package utility

import (
	"fmt"
	"strconv"
)

// to print the prime nubers
func Primes() {
	fmt.Println("the prime numbers are")
	for i := 0; i < 1000; i++ {
		if PrimeNum(i) {
			fmt.Println("prime no -> ", i)
		}
	}

}

// to check number prime or not
func PrimeNum(number int) bool {
	for i := 2; i <= number/2; i++ {
		if number%i == 0 {
			return false
		}
	}
	return true
}

// function for bubble sort
func BubbleSort() {
	var size int
	fmt.Println("enter the size of array")
	fmt.Scanf("%d", &size)
	array := make([]int, size)
	fmt.Println("enter the elements of array")
	for i := 0; i < len(array); i++ {
		fmt.Scanf("%d", &array[i])
	}
	for i := 0; i < len(array); i++ {
		for j := i; j < len(array); j++ {
			if array[i] > array[j] {
				array[i], array[j] = array[j], array[i]
			}
		}
	}
	fmt.Printf("%+v\n", array)
}

// to find given string is annagram or not
func StringAnnagram() {
	var str1, str2 string
	fmt.Println("enter 1st string ")
	fmt.Scanf("%s", &str1)
	fmt.Println("enter 2st string ")
	fmt.Scanf("%s", &str2)
	stra := string(sort([]rune(str1)))
	strb := string(sort([]rune(str2)))
	if stra == strb {
		fmt.Println("Strings are anagram")
	} else {
		fmt.Println("Strings are not anagram")
	}
}
func sort(s []rune) []rune {
	for i := 0; i < len(s); i++ {
		for j := i; j < len(s); j++ {
			if s[i] < s[j] {
				s[i], s[j] = s[j], s[i]
			}
		}
	}
	return s
}

// to find prime annagram and prime palindrome
func Number() {
	var count int = 0
	for i := 0; i < 1000; i++ {
		if PrimeNumber(i) {
			count++
		}
	}
	a := make([]int, count)
	var ini int = 0
	for i := 0; i < 1000; i++ {
		if PrimeNumber(i) {
			a[ini] = i
			ini++
		}
	}
	for i := 0; i < len(a); i++ {
		for j := i + 1; j < len(a); j++ {

			if Annagram(a[i], a[j]) {
				fmt.Printf("the number %d and %d are annagrams\n", a[i], a[j])
			}
		}
	}

	for i := 0; i < len(a); i++ {
		if Palindrome(a[i]) {
			fmt.Printf("the number %d is palindrome \n", a[i])
		}
	}
}

//check for annagram
func Annagram(number int, number2 int) bool {
	A := strconv.Itoa(number)
	str1 := string(Sort([]rune(A)))
	B := strconv.Itoa(number2)
	str2 := string(Sort([]rune(B)))
	if str1 == str2 {
		return true
	} else {
		return false
	}
}

//check for prime numbers
func PrimeNumber(number int) bool {
	for i := 2; i <= number/2; i++ {
		if number%i == 0 {
			return false
		}
	}
	return true
}

//check for palindrome
func Palindrome(number int) bool {
	remainder := 0
	reverse := 0
	temp := number
	for {
		remainder = number % 10
		reverse = reverse*10 + remainder
		number /= 10
		if number == 0 {
			break
		}
	}
	if temp == reverse {
		return true
	}
	return false
}

//function to sort the string
func Sort(s []rune) []rune {
	for i := 0; i < len(s); i++ {
		for j := i; j < len(s); j++ {
			if s[i] < s[j] {
				s[i], s[j] = s[j], s[i]
			}
		}
	}
	return s
}

//merge sort function

func Merge(arr []string, l int, m int, r int) {
	left := m - l + 1
	right := r - m
	Left := make([]string, left)   // temp array
	Right := make([]string, right) // temp array
	for i := 0; i < left; i++ {
		Left[i] = arr[l+i] // creating left array
	}
	for j := 0; j < right; j++ {
		Right[j] = arr[m+1+j] // creating right array
	}
	i := 0
	j := 0
	k := l
	for i < left && j < right {
		if Left[i] <= Right[j] {
			arr[k] = Left[i] // swaping original array
			i++
		} else {
			arr[k] = Right[j]
			j++
		}
		k++
	}
	for i < left {
		arr[k] = Left[i] // remaing elements
		k++
		i++
	}
	for j < right {
		arr[k] = Right[j] // remaing elements
		k++
		j++
	}
}

func MergeSort(arr []string, l int, r int) {
	if l < r {
		m := l + (r-l)/2
		MergeSort(arr, l, m)   // takes left array
		MergeSort(arr, m+1, r) // takes right array
		Merge(arr, l, m, r)    // merge both left and right array
	}
}
