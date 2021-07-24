"use strict";

function leaderboard(arr) {
  var n = arr.length, swapped, tmp;
  do {
    swapped = false;
    for (var i = 1; i < n; i++) {
      if (arr[i-1] < arr[i]) {
        tmp = arr[i];
        arr[i] = arr[i-1];
        arr[i-1] = tmp;
        swapped = true; 
      }
    }
  } while (swapped && n--)
}
a = [50, 60, 70, 80, 150, 120]

bubbleSort(a);
console.log(a);
