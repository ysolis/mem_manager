# mem_manager

MemManager tries to emulate how a memory allocation based in C with malloc and free, can be emulated in php.

the first idea is to try to emulate the "memory" and the "pointers" used in C language.

So, we define a big memory buffer created as a constructor for the class.
One idea with C, Pascal and other similar languages will be to manager a List for the memory assignment (a Simple or Double Linked List), This go outside the PHP capabilities so we manage the allocation with a PHP Array, that store the position as an Index and how much chars/bytes are asigned to this position.


