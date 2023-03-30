let k = 5;
const n = 10;

    function findPairs(n, target) {
      let count = 0;
      const arr = [];

      for (let i = 1; i <= n; i++) {
         arr.push(i);   
      }

       for (let i = 0; i < arr.length; i++) {
         for (let j = i + 1; j < arr.length; j++) {
           if (Math.abs(arr[i] - arr[j]) === target) {
             count++;
           }
         }
       }
    
       return count;
    }

    console.log(findPairs(n,k))
   

