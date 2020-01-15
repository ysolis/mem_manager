# mem_manager

MemManager tries to emulate how a memory allocation based in C with malloc and free, can be emulated in php.

the first idea is to try to emulate the "memory" and the "pointers" used in C language.

So, we define a big memory buffer created as a constructor for the class.
One idea with C, Pascal and other similar languages will be to manager a List for the memory assignment (a Simple or Double Linked List), This go outside the PHP capabilities so we manage the allocation with a PHP Array, that store the position as an Index and how much chars/bytes are asigned to this position.

- The Alloc function get space in the internal buffer to store the data (string) and return the position in the buffer as an "index" (is the attempt to have a "pointer"). If we don't have enough free space, this return False.
- The Position get the position where the index is stored in the buffer, based in the positions from the previous indexes "created". If the index passed is invalid (greater than the index created) this will return false.
- The Store function do the process to "store" the data in the buffer. malloc don't do any measure to avoid memory overflows in C, so at least in this first version we don't do any attempt in this Store function.
- The Free function, "free" the Segment in the buffer assigned. First, the Array dont delete the index, instead of this, puts their value to Zero, and after this, move the next index to cover the position. This idea is the more closer to a process to maintain the segments assigned joined, and avoid "memory fragmentation" with the buffer [TODO]

The idea with this Mem manager is to avoid the memory fragmentation that you will have in C/C++/Pascal with the Free function, at the cost to increase the Array, my idea will be that use something similar to a Linked List in PHP (i will need to research this) to have a mechanism that dont create unused data (because when whe Free an space, we lost a created Array item).

Well, we will see if I can finish the Free method in this prototype :) (The idea is to move all the index above, exactly the char lenght of the index free)

