<script>

function callIndex(jID) {
  var xhttp1 = new XMLHttpRequest();
  xhttp1.onreadystatechange = function() {
    if (xhttp1.readyState == 4 && xhttp1.status == 200) {
	document.getElementById('st' + jID).innerHTML = xhttp1.responseText;
    }
  };
  var go = document.getElementById('go' + jID).value;
  var x = "/";
// Call for a PHP page with your SCHOOL Objects on it
  c = "fill.php?s="+jID;
  xhttp1.open("POST", x+c, true);
  xhttp1.send();
}

function callDLA(s,j) {
  var xhttp2 = new XMLHttpRequest();
 // Call for a PHP page (user.php) with SessionID s and API file j
 // If you wish you can change the CSS with this, and 'j'
  xhttp2.open("POST", "/user.php?SESSID="+s+"&json="+j, true);
  xhttp2.send();
}
</script>
<?
/*
 * SCHOOL - Copyright (C) 2018
 * Author: Anthony Pulse, Jr.
 * @thexiv via twitter.com
 * You may use this file. You may not
 * extract portions. You must
 * leave notices and comments
 * where they are. The code is
 * provided without liability. If you have
 * a bug, please explain your bug.
 * If you have an idea, leave a msg.
 * I have 2 contacts you can reach
 * me at, above. Thank you.
 * Plz donate via PayPal to
 * inland14@live.com
 * You likey, Me likey! - Cabaret
*/

/* Swatch Containers Hypertext Object-Oriented Library for PHP
 * -------------------------------------------------------------
 * SCHOOL is a container super-extension for PHP 7+
 * that makes everything you thought difficult,
 * impossible, or completely outside the grasp of
 * PHPs language restrictions completely doable.
 * It contains each container Java has (except the
 * legacy ones) to make projects as suitable to other
 * coders to continue on when the work as they
 * have done ends, setting up a dialog between
 * incoming and outgoing programmers. This is all
 * made in the hopes that PHP will one day be
 * able to be used for GUI engagement; in other
 * words: OS based apps can be made strictly
 * from PHP and JS for Android and Windows!
 * -- Sincerely, @thexiv - inland14@live.com --
 * Donations Welcome!
*/

	function error_msg($err_type, $err_msg, $err_file, $err_line) {
		echo $err_type . ': ' . $err_msg . ' In file ' . $err_file . ' On line ' . $err_line;
	}

	set_error_handler("error_msg");

	class IndexException extends Exception {
		public function __construct($message) {
			trigger_error($this->getCode(), $message, $this->getFile(), $this->getLine());
		}
	}

	class TypeError extends Exception {
		public function __construct($message) {
			trigger_error($this->getCode(), $message, $this->getFile(), $this->getLine());
		}
	}
 
	class SyntaxError extends Exception {
		public function __construct($message)  {
			trigger_error($this->getCode(), $message, $this->getFile(), $this->getLine());
		}
	}

	class Container {
		// Type Specifications
		public $typeOf;
		public $rootType;
		// Element array()
		public $dat;
		// Cache array()'s
		public $cache;
		public $cacheon;
		public $mem;
		// $this->strict >= 1 to Use IndexExceptions
		// in Containers (use_strict($bool))
		public $strict;

		public function __construct() {
			$this->mem = new Vector(Set);
			$this->cacheon = 0;
			$this->strict = 0;
		}

		// Resume/Stop Cache creation
		public function contCache($r) {
			if ($r == 1) {
				$this->cacheon = 1;
				return 1;
			}
			else {
				$this->cacheon = 0;
				return 0;
			}
		}

		// Create New Cache element
		public function cache() {
			if ($this->cacheon == 1) {
				$this->mem->push_back($this);
				return 1;
			}
			else return 0;
		}

		// Remove newest Cache element
		public function uncache() {
			if ($this->cacheon == 1) {
				$this->mem->pop_back();
				return 1;
			}
			else return 0;
		}

		// Strict IndexException Error Calling
		public function use_strict($bool) {
			if ($bool != 0)
				$this->strict = 1;
			else $this->strict = 0;
			return $this->strict;
		}
	}

	// $this->vect points to your currVect()
	// an Iter (or revIter) uses it like *p
	// setIndex($val) points $this->vect
	// to the Index $val after joinVect()
	// has been called
	class Vector extends Container {

		public $vectorTemp;
		public $parentType;
		public $childType;
		// Pointer to current Index
		public $vect;
		// $vect[$datCntr] (The index pointed to)
		private $datCntr;

		public function __construct($type) {
			if ($type == 'Dequeue') {
				$this->childType = 'Dequeue';
				$this->parentType = 'Vector';
			} // If you want a Vector("String"), use Vector("Any")
			else if ($type == 'Queue') {
				$this->childType = 'Queue';
				$this->parentType = 'Vector';
			}
			else if ($type == 'Set') {
				$this->childType = 'Set';
				$this->parentType = 'Vector';
			}
			else if ($type == 'SortedSet') {
				$this->childType = 'SortedSet';
				$this->parentType = 'Vector';
			}
			else if ($type == 'NavigableSet') {
				$this->childType = 'NavigableSet';
				$this->parentType = 'Vector';
			}
			else if ($type == 'Map') {
				$this->childType = 'Map';
				$this->parentType = 'Vector';
			}
			else if ($type == 'SortedMap') {
				$this->childType = 'SortedMap';
				$this->parentType = 'Vector';
			}
			else if ($type == 'NavigableMap') {
				$this->childType = 'NavigableMap';
				$this->parentType = 'Vector';
			}
			else if ($type == 'mMap') {
				$this->childType = 'mMap';
				$this->parentType = 'Vector';
			}
			else if ($type == 'Stack') {
				$this->childType = 'Stack';
				$this->parentType = 'Vector';
			}
			else if ($type == 'Thread') {
				$this->childType = 'Thread';
				$this->parentType = 'Vector';
			}
			else if ($type == 'Any') {
				$this->childType = 'Any';
				$this->parentType = 'Vector';
			}
			else {
				throw new TypeError('Invalid Type');
				return 0;
			}
			$this->rootType = 'Container';
			$this->typeOf = 'Vector';
			$this->pv = -1;
			return 1;
		}

		public function destroy() {
			$vectorTemp = null;
			$parentType = null;
			$childType = null;
			$this->dat = null;
		}

		public function clear() {
			$this->dat = null;
		}

		// Report Size of Container
		public function size() {
			if (sizeof($this->dat) >= 0)
				return sizeof($this->dat);
			else return -1;
		}

		// Add Vector with $r and Join if $bool == 1
		public function push($r) {
			if ($this->childType == 'Any' || $this->childType == $r->typeOf)
				$this->dat[] = $r;
			else {
				throw new TypeError('Invalid Type');
				return 0;
			}
			if ($this->size() == 1)
				$this->Iter();
			$this->cache();
			return 1;
		}

		// Remove $r from Vector
		public function pop() {
			if ($this->size() == 1)
				$this->dat = null;
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			$temporneous = array();

			$this->cache();
			for ($i = 0; $i < $this->size()-1; $i++) {
				$temporneous[] = $this->dat[$i];
			}
			$this->setIndex($this->getIndex());
			return $this->dat = $temporneous;
		}

		// Increment datCntr (index)
		private function cntIncr() {
			$this->sync();
			return ++$this->datCntr;
		}

		// Decrement datCntr (index)
		private function cntDecr() {
			$this->sync();
			return --$this->datCntr;
		}

		// Get Index
		public function getIndex() {
			return $this->datCntr;
		}

		// Sets and Joins Map Index
		public function setIndex($indx) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector');
				return 0;
			}
			if ($this->sIndex($indx)) {
				$this->joinVect();
				return 1;
			}
		}

		public function add($r, $indx) {
			$setTemp = '';
			if ($this->size() == 0) {
				$this->dat[] = $r;
				return 1;
			}
			if ($indx < 0) {
				throw new IndexException('Invalid Index');
				return 0;
			}
			$this->dat[] = $r;
			
			return 1;
		}

		// Set new Index
		public function sIndex($indx) {
			if ($this->size() == 0 || $this->size() <= $indx) {
				$this->datCntr = 0;
				$this->vect = null;
				throw new IndexException('Invalid Index');
				return 0;
			}
			if ($indx < $this->size() && $indx >= 0)
				return $this->datCntr = $indx;
		}

		// Return Vector at $indx
		public function at($indx) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			$temp = array();
			if ($indx < $this->size() && $indx >= 0) {
				$temp = $this->dat[$indx];
				return $temp;
			}
			return -1;
		}

		// Create new Vector<T> (vector<vector<T>>)
		public function newVect() {
			$this->cache();
			if ($this->childType == 'Dequeue') {
				$r = new Dequeue();
			}
			else if ($this->childType == 'Queue') {
				$r = new Queue();
			}
			else if ($this->childType == 'Set') {
				$r = new Set();
			}
			else if ($this->childType == 'SortedSet') {
				$r = new SortedSet();
			}
			else if ($this->childType == 'NavigableSet') {
				$r = new NavigableSet();
			}
			else if ($this->childType == 'Map') {
				$r = new Map();
			}
			else if ($this->childType == 'SortedMap') {
				$r = new SortedMap();
			}
			else if ($this->childType == 'NavigableMap') {
				$r = new NavigableMap();
			}
			else if ($this->childType == 'mMap') {
				$r = new mMap();
			}
			else if ($this->childType == 'Stack') {
				$r = new Stack();
			}
			else if ($this->childType == 'Thread') {
				$r = new Thread();
			}
			else if ($this->childType == 'Any') {
				$r = "";
			}
			else {
				throw new TypeError('Invalid Type');
				return 0;
			}
		}

		// Insert new Vector<T> (vector<vector<T>>)
		public function insVect($ins) {
			$this->cache();
			if ($this->childType == 'Dequeue') {
				$r = new Dequeue();
			}
			else if ($this->childType == 'Queue') {
				$r = new Queue();
			}
			else if ($this->childType == 'Set') {
				$r = new Set();
			}
			else if ($this->childType == 'SortedSet') {
				$r = new SortedSet();
			}
			else if ($this->childType == 'NavigableSet') {
				$r = new NavigableSet();
			}
			else if ($this->childType == 'Map') {
				$r = new Map();
			}
			else if ($this->childType == 'SortedMap') {
				$r = new SortedMap();
			}
			else if ($this->childType == 'NavigableMap') {
				$r = new NavigableMap();
			}
			else if ($this->childType == 'mMap') {
				$r = new mMap();
			}
			else if ($this->childType == 'Stack') {
				$r = new Stack();
			}
			else if ($this->childType == 'Thread') {
				$r = new Thread();
			}
			else if ($this->childType == 'Any') {
				$r = "";
			}
			else {
				throw new TypeError('Invalid Type');
				return 0;
			}

			$t = array();
			for ($i = 0 ; $i < $ins ; $i++)
				$t[] = $this->dat[$i];
			$t[] = $r;
			
			for ($i = ins ; $i < $this->size() ; $i++)
				$t[] = $this->dat[$i];
			$this->dat = $t;

			$t = array();
			return 1;
		}

		// Returns true if Vector has next Element
		public function hasNext() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->getIndex()+1 < $this->size())
				return 1;
			return 0;
		}

		// Iterate once forward through Vector
		public function nextVect() {
			if ($this->hasNext() == 1) {
				$this->cntIncr();
				$this->joinVect();
				return 1;
			}
			else if ($this->size() == 1) {
				$this->setIndex(0);
				$this->joinVect();
				return 0;
			}
			else if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				$this->setIndex(0);
				$this->vect = null;
				return 0;
			}
		}

		// Iterate Forward through Vector
		public function Iter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextVect();
				$this->joinVect();
				return 1;
			}
			else {
				$this->joinVect();
				return 0;
			}
			return 1;
		}

		// Cycle Forward through Vector
		public function Cycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextVect();
				$this->joinVect();
				return 1;
			}
			else {
				$this->setIndex(0);
				$this->joinVect(0);
				return 0;
			}
			return 1;
		}

		// Iterate Forward through Vector
		public function revIter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->hasPrev() == 1) {
				$this->prevVect();
				$this->joinVect();
				return 1;
			}
			else {
				$this->joinVect();
				return 0;
			}
			return 1;
		}

		public function revCycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->hasPrev() == 1) {
				$this->prevVect();
				$this->joinVect();
				return 1;
			}
			else {
				$this->setIndex($this->size()-1);
				$this->joinVect();
				return 0;
			}
			return 1;
		}

		// Return true if Previous Vector exists
		public function hasPrev() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->getIndex() - 1 > 0)
				return 1;
			return 0;
		}

		// Iterate to Previous Vector if $bool = 1;
		// Setup $cntDecr (index) for Prev. Vector if $bool = 0;
		public function prevVect() {
			if ($this->hasPrev() == 1) {
				$this->cntDecr();
				$this->joinVect();
				return 1;
			}
			else if ($this->size() == 1) {
				$this->setIndex(0);
				$this->joinVect();
				return 0;
			}
			else if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				$this->setIndex(0);
				$this->vect = null;
				return 0;
			}
		}

		// Retrieve current Index of Vector Pointer
		public function currVect() {
			return $this->getIndex();
		}

		// Remove $r from Vector
		public function remVect($r) {
			if ($this->size() == 1) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			if ($this->size() == 0 || $this->size() <= $r || $r < 0) {
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			$temporneous = array();

			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($i != $r)
					$temporneous[] = $this->dat[$i];
			}
			$this->setIndex($this->getIndex());
			return $this->dat = $temporneous;
		}

		// Point Vector to getIndex()
		public function joinVect() {
			if ($this->size() == 0) {
				$this->vect = null;
				if ($this->strict == 1) throw new IndexException('Empty Vector Array');
				return 0;
			}
			if ($this->size() == 1)
				$this->setIndex(0);
			if ($this->getIndex() == 0 || $this->getIndex() >= $this->size())
				$this->setIndex($this->size()-1);

			$this->vect = $this->dat[$this->getIndex()];
			return 1;
		}

		public function sync() {
			if ($this->pv >= 0 && $this->pv < sizeof($this->dat)) {	
				if ($this->vect != null && $this->datCntr != $this->pv)
					$this->dat[$this->pv] = $this->vect;
			}
			if ($this->datCntr > sizeof($this->dat) || $this->datCntr < 0)
				$this->datCntr = 0;
			$this->vect = $this->dat[$this->datCntr];
			$this->pv = $this->datCntr;
			return 1;
		}

	}

	class Dequeue extends Container {

		public $dqueueTemp;
		public $parentType;

		public function __construct() {
			$this->rootType = 'Container';
			$this->parentType = 'Container';
			$this->typeOf = 'Dequeue';
		}

		public function destroy() {
			$this->dat = null;
		}

		// Report Size of Container
		public function size() {
			if (sizeof($this->dat) >= 0)
				return sizeof($this->dat);
			else return -1;
		}

		// Retrieve and Remove first Entry
		public function pollFront() {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			for ($i = 1; $i < $this->size(); $i++)
				$dqueueTemp[] = $this->dat[$i];
			$j = $this->dat[0];
			if (sizeof($dqueue) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $dqueueTemp;
			$this->setIndex($this->getIndex());
			return $j;
		}

		// Retrieve and Remove last entry
		public function pollBack() {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size()-1; $i++)
				$dqueueTemp[] = $this->dat[$i];
			$j = $this->dat[$this->size()-1];
			if (sizeof(dqueue) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $dqueueTemp;
			return $j;
		}

		// Add entry
		public function push($r) {
			$this->cache();
			return $this->dat[] = $r;
		}

		// Remove last entry
		public function pop() {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size()-1; $i++)
				$dqueueTemp[] = $this->dat[$i];
			$j = $this->dat[$this->size()-1];
			if ($this->size() == 1) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $dqueueTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}

		// Retrieve First Entry
		public function getFirst() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			return $this->dat[0];
		}

		// Retrieve Last Entry
		public function getLast() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			return $this->dat[$this->size()-1];
		}

		// Empty Dequeue
		public function clear() {
			$this->cache();
			$this->dat = array();
			return 1;
		}

		// Remove first entry
		public function removeFirst() {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}

			$this->cache();
			if ($this->size() == 1) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			for ($i = 1; $i < $this->size(); $i++)
				$dqueueTemp[] = $this->dat[$i];
			$this->dat = $dqueueTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}

		// Remove last entry
		public function removeLast() {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$this->cache();
			if ($this->size() == 1) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			for ($i = 0; $i < $this->size()-1; $i++)
				$dqueueTemp[] = $this->dat[$i];
			$this->dat = $dqueueTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}

		// Remove first occurrence of $r
		public function remFirstOcc($r) {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$p = 0;
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($r == $this->dat[$i] && $p == 0) {
					$p = 1;
					continue;
				}
				$dqueueTemp[] = $this->dat[$i];
			}
			$this->dat = $dqueueTemp;
			if (sizeof($dqueue) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			return 1;
		}

		// Remove Last occurrence of $r
		public function remLastOcc($r) {
			$dqueueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Dequeue');
				return 0;
			}
			$p = 0;
			$this->cache();
			$m = $this->size();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($r == $this->dat[$i])
					$p = $i;
			}

			for ($i = 0; $i < $this->size(); $i++) {
				if ($i == $p)
					continue;
				$dqueueTemp[] = $this->dat[$i];
			}
			if ($this->size() == sizeof($dqueueTemp)) {
				if ($this->strict == 1) throw new IndexException('No such Element');
				return 0;
			}
			if (sizeof($dqueueTemp) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $dqueueTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}
	}

	class Queue extends Container {

		public $queueTemp;
		public $parentType;

		public function __construct() {
			$this->rootType = 'Container';
			$this->parentType = 'Container';
			$this->typeOf = 'Queue';
		}

		public function destroy() {
			$this->dat = null;
		}

		// Report Size of Container
		public function size() {
			if (sizeof($this->dat) >= 0)
				return sizeof($this->dat);
			else return -1;
		}

		// Remove while Retrieving entry 1
		public function poll() {
			$queueTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Queue');
				return 0;
			}
			$this->cache();
			for ($i = 1; $i < $this->size(); $i++) {
				if ($this->dat[$i] == null)
					continue;
				$queueTemp[] = $this->dat[$i];
			}
			if (sizeof($dqueueTemp) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$j = $this->dat[0];
			$this->dat = $queueTemp;
			$this->setIndex($this->getIndex());
			return $j;
		}

		// Push on to Queue
		public function push($r) {
			$queueTemp = '';
			$this->cache();
			return $this->dat[] = $r;
		}

		// Retrieve first Queue and pop
		public function pop() {
			$queueTemp = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Queue');
				return 0;
			}
			$this->cache();
			for ($i = 1; $i < $this->size(); $i++)
				$queueTemp[] = $this->dat[$i];
			$this->dat = $queueTemp;
			return 1;
		}

		// Return first Queue
		public function getElement() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Queue');
				return 0;
			}
			return $this->dat[0];
		}

		// Empty Queue
		public function clear() {
			$this->cache();
			$this->dat = array();
			return 1;
		}
	}

	class Set extends Container {

		public $setTemp;
		public $parentType;

		public function __construct() {
			$this->cache = array();
			$this->rootType = 'Container';
			$this->parentType = 'Container';
			$this->typeOf = 'Set';
		}

		public function destroy() {
			$this->dat = null;
		}

		// Report Size of Container
		public function size() {
			if (sizeof($this->dat) >= 0)
				return sizeof($this->dat);
			else return -1;
		}

		// Merge sets
		public function addAll($indx, $r) {
			if ($this->typeOf != $r->typeOf) {
				throw new TypeError('Mismatched Types');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $r->size(); $i++)
				$this->add($indx, $r->dat[$i]);
		}

		// Empty Set
		public function clear() {
			$this->cache();
			$this->dat = array();
			return;
		}

		// Splice $r into $indx point
		public function add($r) {
			$setTemp = '';
			if ($this->size() == 0) {
				$this->dat[] = $r;
				return 1;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->dat[$i] == $r) {
					return 0;
				}
			}
			$this->dat[] = $r;

			if (($this->typeOf == 'SortedSet' || $this->typeOf == 'NavigableSet') && $this->parentType == 'Set') {
				$this->cache();
				sort($this->dat);
			}
			return 1;
		}

		// Return if Value exists
		public function valIsIn($v) {
			$temp = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++)
				if ($this->dat[$i] == $v)
					return 1;
			return 0;
		}

		// Compare $this with $r
		public function compare($r) {
			$temp = array();
			if ($this->typeOf != $r->typeOf) {
				throw new TypeError('Mismatched Types');
				return 0;
			}
			if ($r->size() != $this->size())
				return 0;
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->valIsIn($r->dat[$i]))
					$temp[] = $r->dat[$i];
			}
			if (sizeof($temp) < $this->size())
				return 0;
			return 1;
		}

		// Return entry at $indx
		public function get($indx) {
			if ($this->size() == 0 || $indx >= $this->size()) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			return $this->dat[$indx];
		}

		// Return Index of Entry
		public function exists($r) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			$indx = -1;
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->dat[$i] == $r)
					$indx = $i;
			}
			return $indx;
		}

		// Remove Entry at $indx
		public function remIndex($indx) {
			$setTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $indx; $i++)
				$setTemp[] = $this->dat[$i];
			for ($i = $indx+1; $i < $this->size(); $i++)
				$setTemp[] = $this->dat[$i];
			if (sizeof($setTemp) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $setTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}

		// Remove Value if exists (otherwise 0)
		public function remValue($val) {
			$setTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->dat[$i] != $val)
					$setTemp[] = $this->dat[$i];
			}
			if ($this->size() == sizeof($setTemp))
				return 0;
			if (sizeof($setTemp) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $setTemp;
			$this->setIndex($this->getIndex());
			return 1;
		}

	}

	class SortedSet extends Set {

		public $sSetTemp;
		public $parentType;

		public function __construct() {
			$this->cache = array();
			$this->rootType = 'Container';
			$this->parentType = 'Set';
			$this->typeOf = 'SortedSet';
		}

		public function destroy() {
			$this->dat = null;
		}

		// Return entries before $indx
		public function headSet($indx) {
			$sSetTemp = '';
			if ($this->size() == 0 || $indx < 0 || $indx >= $this->size()) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			for ($i = 0; $i < $indx; $i++)
				$sSetTemp[] = $this->dat[$i];
			return $sSetTemp;
		}

		// Returns first Entry
		public function first() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			return $this->dat[0];
		}

		// Returns last Entry
		public function last() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			return $this->dat[$this->size()-1];
		}

		// Return between $st and $en (This is very functional)
		// $Lb == 1 >= $st ; $Lb == 0 < $st
		// $Hb == 0 >= $en ; $Hb == < $en
		public function subSet($st, $Lb, $en, $Hb) {
			$sSetTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			for ($i = $st; $i < $this->size(); $i++) {
				if ($Lb == 1 && $this->dat[$i] >= $st) {
					do {
						$sSetTemp[] = $this->dat[$i];
						$i++;
					} while ($st <= $this->dat[$i] && $i < $this->size());
				}
				if ($Lb == 0 && $this->dat[$i] < $st) {
					do {
						$sSetTemp[] = $this->dat[$i];
						$i++;
					} while ($st < $this->dat[$i] && $i < $this->size());
				}
				if ($Hb == 1 && $this->dat[$i] <= $en) {
					do {
						$sSetTemp[] = $this->dat[$i];
						$i++;
					} while ($en <= $this->dat[$i] && $i < $this->size());
				}
				if ($Hb == 0 && $this->dat[$i] > $en) {
					do {
						$sSetTemp[] = $this->dat[$i];
						$i++;
					} while ($en < $this->dat[$i] && $i < $this->size());
				}
			}
			return $sSetTemp;
		}

	}

	class NavigableSet extends SortedSet {

		public $navTemp;
		public $parentType;

		public function __construct() {
			$this->rootType = 'Container';
			$this->parentType = 'Set';
			$this->typeOf = 'NavigableSet';
		}

		public function destroy() {
			$this->dat = null;
		}

		// Retrieves first entry <= $r
		public function ceiling($r) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($r <= $this->dat[$i])
					return $this->dat[$i];
			}
			return 0;
		}

		// Retrieves first entry < $r
		public function floor($r) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			for ($i = $this->size()-1; $i > 0; $i++) {
				if ($r > $this->dat[$i])
					return $this->dat[$i-1];
			}
			return 0;
		}

		// Retrieves and removes First Entry
		public function pollFirst() {
			$navTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			for ($i = 1; $i < $this->size(); $i++)
				$navTemp[] = $this->dat[$i];
			$j = $this->dat[0];
			if (sizeof($navTemp) == 0) {
				$this->dat = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $navTemp;
			$this->setIndex($this->getIndex());
			return $j;
		}

		// Retrieves and erases last entry
		public function pollLast() {
			$navTemp = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Set');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size()-1; $i++)
				$navTemp[] = $this->dat[$i];
			$j = $this->dat[$this->size()-1];
			$this->dat = $navTemp;
			return $j;
		}

	}

	class Map extends Container {

		public $mapTempK;
		public $mapTempV;
		public $vMap;
		// Holds keys
		public $key;
		// Holds values
		public $value;
		// for future
		public $keyType;
		public $valueType;
		// Holds all Map entries
		public $map;
		public $cnt;
		public $pm;

		public function __construct() {
			$this->rootType = 'Container';
			$this->typeOf = 'Map';
			$this->cnt = -1;
			$this->pm = -1;
			$this->map = null;
		}

		public function destroy() {
			$this->cache = null;
			$this->key = null;
			$this->value = null;
			$this->map = null;
		}

		public function size() {
			if (sizeof($this->key) != sizeof($this->value))
				return 'WOOP! WOOOP! ALERT!!! ERROR!';
			if (sizeof($this->key) >= 0)
				return sizeof($this->key);
			else return -1;
		}

		// Empties Map
		public function clear() {
			$this->cache();
			$this->map = array();
		}

		// Retrieves Entry at Index
		public function at($indx) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$p = -1;
			$temp = array();
			if ($indx >= $this->size() || $indx < 0)
				return 0;
			else {
				$temp = array($this->key[$indx], $this->value[$indx]);
			}
			return $temp;
		}

		// Sorts Maps in Ascending order
		public function Sorter() {
			$this->cache();
			if (sizeof($this->key) > 0) {
				$vals = $this->key;
				sort($vals);
				for ($i = 0; $i < $this->size(); $i++) {
					for ($j = $i; $j < $this->size(); $j++) {
						if ($vals[$i] == $this->key[$j]) {
							$mapTempK[] = $this->key[$j];
							$mapTempV[] = $this->value[$j];
						}
					}
				}
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
		}

		// Returns true if Key exists
		public function keyIsIn($k) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] == $k)
					return $i;
			}
			return -1;
		}

		// Retrieves if entry exists
		public function valIsIn($v) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++)
				if ($this->value[$i] == $v)
					$y[] = $i;
			if (sizeof($y) > 0)
				return $y;
			return -1;
		}

		// Return true if Maps are equal
		public function equals($r) {
			if ($r->size() != $this->size()){
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if (!($this->keyIsIn($r[$i])))
					return 0;
				if (!($this->valIsIn($r[$i])))
					return 0;
			}
			return 1;
		}

		// Return Value from Key
		public function get($k) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->sync();
			if (!($this->keyIsIn($k)))
				return 0;
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] == $k)
					return $this->value[$i];
			}
		}

		// Checks for Empty map (returns true)
		public function isEmpty() {
			if ($this->size() == 0)
				return 1;
			else
				return 0;
		}

		// Merge maps (returns number inserted)
		public function addAll($r) {
			if ($this->typeOf != $r->typeOf){
				throw new TypeError('Mismatched Types');
				return 0;
			}
			$this->cache();
			$i = 0;
			for ($i = 0; $i < $r->size(); $i++)
				$this->add($r->key[$i], $r->value[$i]);
			if (($this->typeOf == 'SortedMap' || $this->typeOf == 'NavigableMap') && $this->parentType == 'Map')
				$this->Sorter();
			if ($this->size() == 1)
				$this->Iter();
			$this->sync();
			return $i;
		}

		// Remove Key with name $k
		public function remove($k) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] != $k) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
			}
			if (sizeof($mapTempK) == 0) {
				$this->key = null;
				$this->value = null;
				return 1;
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->sync();
			return 1;
		}

		// Remove entry with K & V matching $k and $v
		public function removeKV($k, $v) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] != $k && $this->value[$i] != $v) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
			}
			if (sizeof($mapTempK) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->sync();
			return 1;
		}

		public function plain() {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$s = new Set();
			$m = $this->key;
			for ($i = 0; $i < $this->size(); $i++) {
				for ($j = $i+1 ; $j < $this->size() ; $j++) {
					if ($this->key[$i] == $this->key[$j]) {
						$this->remove($this->key[$i]);
						$i = 0;
						break;
					}
				}
			}
			return 1;
		}

		// Replace KV
		public function replace($k, $v) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			$val = '';
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] != $k) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
				else {
					$mapTempK[] = $this->key[$i];
					$val = $this->value[$i];
					$mapTempV[] = $v;
				}
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->sync();
			return $val;
		}

		public function sync() {
			if ($this->map != null && $this->keyIsIn($this->map[0]) >= 0 && $i = $this->keyIsIn($this->map[0])) {
				$this->key[$i] = $this->map[0];
				$this->value[$i] = $this->map[1];
			}
			else if ($this->pm > -1 && !$this->keyIsIn($this->map[0])) {
				$this->key[$this->pm] = $this->map[0];
				$this->value[$this->pm] = $this->map[1];	
			}
			if ($this->cnt == -1) { }
			else $this->map = array($this->key[$this->cnt],$this->value[$this->cnt]);
			$this->pm = $this->cnt;
			return 1;
		}

		// Add entry
		public function add($k, $v) {
			$mapTempK = array();
			$mapTempV = array();
			$p = (-1);
			$this->cache();
			if ($this->size() > 0) {
				for ($i = 0; $i < $this->size(); $i++) {
					if ($this->key[$i] == $k)
						$p = $i;
				}
			}
			if ($p == (-1)) {
				$this->key[] = $k;
				$this->value[] = $v;
			}
			else {
				return 0;
			//	$this->value[$p] = $v;
			}
			if (($this->typeOf == 'SortedMap' || $this->typeOf == 'NavigableMap') && $this->parentType == 'Map')
				$this->Sorter();

			if ($this->size() == 1)
				$this->Iter();
			return 1;
		}

		public function Iter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->cnt == -1) {
				$this->cnt = 0;
				$this->sync();
				return 0;
			}
			if ($this->cnt + 1 < $this->size()) {
				$this->cnt++;
				$this->sync();
				return 1;
			}
			else {
				$this->cnt = $this->size()-1;
				$this->sync();
				return 0;
			}
			return 1;
		}

		public function revIter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->cnt == -1) {
				$this->cnt = $this->size()-1;
				$this->sync();
				return 0;
			}
			if ($this->cnt - 1 >= 0) {
				$this->cnt--;
				$this->sync();
				return 1;
			}
			else {
				$this->cnt = -1;
				$this->sync();
				return 0;
			}
			return 1;
		}

	}

	// $this->mmap is the set of Maps
	//This is the Map-in-Map Extension
	class mMap extends Map {
		public $val;
		public $keys;
		public $dat;
		// Maps array()
		public $map;
		// Index integer
		public $datCntr;
		// Holds Keys
		public $key;
		// Holds Values
		public $value;
		public $reglist;
		public $regreturn;
		// Current joined map
		public $mmap;
		public $mname;
		public $pm;
		public $cnt;

		public function __construct() {
			$this->typeOf = 'mMap';
			$this->parentType = 'Container';
			$this->rootType = 'Container';
			$this->cache = new Vector('Map');
			$this->datCntr = 0;
			$this->mname = null;
			$this->pm = -1;
			$this->cnt = -1;
		}

		public function destroy() {
			$this->datCntr = null;
			$this->cache = null;
			$this->typeOf = null;
			$this->parentType = null;
			$this->rootType = null; 
			$this->key = null;
			$this->value = null;
			$this->mmap = null;
			$this->pm = -1;
			$this->mmap = null;
			$this->mname = null;
			return 1;
		}

		public function size() {
			$j = 0;
			return sizeof($this->key);
		}

		// Return Map fitting $regex
		public function getMap($regex) {
			$reglist = array();
			$regreturn = array();
			for ($j = 0 ; $j < sizeof($this->key) ; $j++) {
				if (preg_match($regex, $this->key[$j])) {
					$reglist[] = $this->key[$j];
				}
			}
			$regreturn[] = $reglist;
			$reglist = array();
			$this->sync();
			return $regreturn;
		}

		// Add Map
		public function newMap($key, $r) {
			$this->cache();
			$this->add($key,$r);
			$this->setIndex($this->size()-1);
			$this->sync();
			return 1;
		}

		// Return true if next Map exists
		public function hasNext() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->getIndex() + 1 < $this->size())
				return 1;
			return 0;
		}

		// Iterate once forward through Maps
		public function nextMap() {
			if ($this->hasNext() == 1 && $this->size() > 1) {
				$this->cntIncr();
				$this->sync();
				$this->joinMap();
				return 1;
			}
			else if ($this->size() == 1) {
				$this->setIndex(0);
				$this->sync();
				$this->joinMap();
				return 0;
			}
			else if ($this->size() == 0) {
				$this->setIndex(0);
				return 0;
			}
			return 0;
		}

		// Return Key
		public function findKey($regex) {
			$reglist = array();
			$regreturn = array();
			for ($j = 0; $j < $this->size(); $j++) {
				$temp = $this->value[$j];
				for ($s = 0 ; $s < sizeof($this->value[$j]->key) ; $s++) {
					$k = $temp->key[$s];
					if (preg_match($regex, $k)) {
						$reglist[] = array($this->key[$j],$k,$j,$s);
					}
				}
			}
			$regreturn = $reglist;
			$this->sync();
			if (sizeof($reglist) == 0)
				return 0;
			return $regreturn;
		}

		// Turns to next Map entry
		public function Iter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextMap();
				return 1;
			}
			else {
				$this->sync();
				return 0;
			}
			return 1;
		}

		// Turns to next Map entry, or starts over
		public function Cycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextMap();
				return 1;
			}
			else {
				$this->setIndex(0);
				return 0;
			}
			return 1;
		}

		public function revIter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->hasPrev() == 1) {
				$this->prevMap();
				return 1;
			}
			else {
				$this->joinMap();
				return 0;
			}
			return -1;
		}

		public function revCycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->hasPrev() == 1) {
				$this->prevMap();
				return 1;
			}
			else {
				$this->setIndex($this->size()-1);
				return 0;
			}
			return 1;
		}

		// Sets and Joins Map Index
		public function setIndex($indx) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				$this->sIndex(0);
			else if ($this->getIndex() == 0 || $this->getIndex() >= $this->size())
				$this->sIndex(0);
			if ($this->sIndex($indx)) {
				$this->joinMap();
				$this->sync();
				return 1;
			}
		}

		// Returns if Previous entry exists
		public function hasPrev() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($this->getIndex() - 1 >= 0)
				return 1;
			return 0;
		}

		// Reverse through Map one entry
		public function prevMap() {
			if ($this->hasPrev() == 1) {
				$this->cntDecr();
				$this->joinMap();
				return 1;
			}
			else if ($this->size() == 1) {
				$this->setIndex(0);
				return 0;
			}
			else if ($this->size() == 0) {
				$this->setIndex(0);
				$this->cnt = -1;
				$this->pm = -1;
				return 0;
			}
		}

		// Removes Map entry
		public function remMap($r) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}

			$this->cache();
			$tempAneous = array();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($i != $r)
					$tempAneous[] = $this->dat[$i];
			}
			if (sizeof($tempAneous) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->dat = $tempAneous;
			$this->setIndex($this->getIndex());
			return 1;
		}

		public function sync() {
			if ($this->mname != null && $this->keyIsIn($this->mname) >= 0) {
				$this->key[$this->keyIsIn($this->mname)] = $this->mname;
				$this->value[$this->keyIsIn($this->mname)] = $this->mmap;
			}
			else if ($this->pm > -1) {
				$this->key[$this->pm] = $this->mname;
				$this->value[$this->pm] = $this->mmap;	
			}
			$this->mname = $this->key[$this->getIndex()];
			$this->mmap = $this->value[$this->getIndex()];
			$this->pm = $this->getIndex();
			return 1;
		}

		// Returns Map at Index (datCntr)
		public function joinMap() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			$this->sync();
			return 1;
		}

		// Private functions for Cycling Map
		private function cntIncr() {
			return ++$this->datCntr;
		}

		private function cntDecr() {
			return --$this->datCntr;
		}

		// Returns Map Index
		public function getIndex() {
			if ($this->size() > $this->datCntr)
				return $this->datCntr;
			else if ($this->size() <= $this->datCntr) {
				$this->datCntr = 0;
				return $this->datCntr;
			}
			return -1;
		}

		// Sets Map Index
		public function sIndex($indx) {
			if ($this->size() == 0) {
				$this->datCntr = 0;
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($indx < $this->size() && $indx >= 0)
				return $this->datCntr = $indx;
		}

		// Clears all Map entries
		public function clear() {
			$this->cache();
			$this->mmap = array();
		}

		// Returns true if Key is in Map
		public function keyIsIn($k) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] == $k)
					return ($i);
			}
			return -1;
		}

		// Returns true if Value is within Map
		public function valIsIn($v) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->sync();
			for ($i = 0; $i < $this->size(); $i++)
				if ($this->value[$i] == $v)
					return 1;
			return 0;
		}

		// Compare Map to $r and Return false is not equal
		public function equals($r) {
			if ($r->typeOf != 'Map') {
				throw new TypeError('Mismatched Types');
				return 0;
			}
			if ($r->size() != $this->size())
				return 0;
			for ($i = 0; $i < $this->size(); $i++) {
				if (!($this->keyIsIn($r[$i])))
					return 0;
				if (!($this->valIsIn($r[$i])))
					return 0;
			}
			return 1;
		}

		//  Return Value at Key $k
		public function get($k) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] == $k)
					return $this->value[$i];
			}
			return -1;
		}

		// Checks for Empty map
		public function isEmpty() {
			if ($this->size() == 0)
				return 1;
			else
				return 0;
		}

		// Add Map of $r KVs to current map
		public function addAll($r) {
			if ('NavigableMap' != $r->typeOf && 'SortedMap' != $r->typeOf && 'Map' != $r->typeOf) {
				throw new TypeError('Mismatched Types');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < sizeof($r->key) ; $i++)
				$this->add($r->key[$i], $r->value[$i]);
			if ($this->size() == 1)
				$this->Iter();
		}

		// Remove Key of $k
		public function remove($k) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] != $k) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
			}
			if (sizeof($mapTempK) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->setIndex($this->getIndex());
			if ($this->size() == 1)
				$this->Iter();
			return 1;
		}

		// Remove Key of $k *WITH* Value of $v
		public function removeKV($k, $v) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($this->key[$i] != $k && $this->value[$i] != $v) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
			}
			if (sizeof($mapTempK) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->setIndex($this->getIndex());
			if ($this->size() == 1)
				$this->Iter();
			return 1;
		}

		// Replace Key of $k with Value of $v
		public function replace($k, $v) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$this->cache();
			$temp = $this->keyIsIn($k);
			if ($temp == -1)
				return 0;

			$this->value[$temp] = $v;
			$this->sync();
			return 1;
		}
	}

	class SortedMap extends Map {

		public $parentType;

		public function __construct() {
			$this->rootType = 'Container';
			$this->parentType = 'Map';
			$this->typeOf = 'SortedMap';
		}

		public function destroy() {
			$this->map = null;
		}

		// Return first KV
		public function firstKey() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			return array($this->key[0], $this->value[0]);
		}

		// Return last KV
		public function lastKey() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			return array($this->key[$this->size()-1], $this->value[$this->size()-1]);
		}

		// Return Keys before $r
		// $vb == 2 returns all
		// $vb == 1 >= $v
		// $vb == 0 < $v
		public function headMap($v, $vb, $r) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			for ($i = 0; $i < $r; $i++) {
				if ($v >= $this->value[$i] && $vb == 1) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
				else if ($v < $this->value[$i] && $vb == 0) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
				else if ($vb == 2) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
				else {
					throw new SyntaxError('Invalid Syntax');
					return 0;
				}
			}
			$vMap = new Map();
			$vMap->key = mapTempK;
			$vMap->value = mapTempV;
			return $vMap;
		}

		// Return KVs between $vst and $ven (This is very functional)
		// Lb == 0 >= $vst ; $Lb == 1 < $vst
		// $Hb == 0 >= $ven ; $Hb == < $ven
		public function subMap($vst, $Lb, $ven, $Hb) {
			$mapTempK = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			if ($vst > $ven) {
				$tmp = $ven;
				$ven = $vst;
				$vst = $tmp;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				if ($Lb == 1) {
					if ($this->value[$i] >= $vst) {
						do {
							$mapTempK[] = $this->key[$i];
							$mapTempV[] = $this->value[$i];
							$i++;
						} while ($vst <= $this->value[$i]);
					}
				}
				else if ($Lb == 0) {
					if ($this->value[$i] > $vst) {
						do {
							$mapTempK[] = $this->key[$i];
							$mapTempV[] = $this->value[$i];
							$i++;
						} while ($vst <= $this->value[$i]);
					}
				}
				else if ($Hb == 1) {
					if ($this->value[$i] <= $ven) {
						do {
							$mapTempK[] = $this->key[$i];
							$mapTempV[] = $this->value[$i];
							$i++;
						} while ($ven >= $this->value[$i]);
					}
				}
				else if ($Hb == 0) {
					if ($this->value[$i] < $ven) {
						do {
							$mapTempK[] = $this->key[$i];
							$mapTempV[] = $this->value[$i];
							$i++;
						} while ($ven >= $this->value[$i]);
					}
				}
				else {
					throw new SyntaxError('Invalid Syntax');
					return 0;
				}
			}
			$vMap = new Map();
			$vMap->key = $mapTempK;
			$vMap->value = $mapTempV;
			return $vMap;
		}

		// Return Tail end of Map at $st
		public function tailMap($st) {
			$mapTemp = array();
			$mapTempV = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			$vals = $this->value;
			sort($vals, SORT_STRING);
			for ($i = 0; $i < $this->size(); $i++) {
				if ($v >= $vals[$i] && $vb == 1) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
				else if ($v > $vals[$i] && $vb == 0) {
					$mapTempK[] = $this->key[$i];
					$mapTempV[] = $this->value[$i];
				}
			}
			$vMap = new Map();
			$vMap->key = $mapTempK;
			$vMap->value = $mapTempV;
			return $vMap;
		}
	}

	class NavigableMap extends SortedMap {

		public $parentType;

		public function __construct() {
			$this->rootType = 'Container';
			$this->parentType = 'Map';
			$this->typeOf = 'NavigableMap';
		}

		public function destroy() {
			$this->map = null;
		}

		// Return Values <= $r
		public function ceilKey($r) {
			$vMap = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				return array($this->key[0], $this->value[0]);
			for ($i = 0; $i < $this->size(); $i++) {
				if ($r <= $this->value[$i]) {
					$vMap[] = $this->key[$i-1];
					$vMap[] = $this->value[$i-1];
					return $vMap;
				}
			}
			return 0;
		}

		// Descending Map Keys
		public function descKeySet() {
			$vMap = array();
			$this->cache();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				return array($this->key[0], $this->value[0]);		
			$keys = $this->key;
			rsort($keys, SORT_STRING);
			for ($i = 0; $i < $this->size(); $i++) {
				for ($j = $i; $j < $this->size(); $j++) {
					if ($keys[$i] == $this->key[$j]) {
						$mapTempK[] = $this->key[$j];
						$mapTempV[] = $this->value[$j];
						break;
					}
				}
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			return 1;
		}

		// Reverse order of Map
		public function descMap() {
			$mapTempK = array();
			$mapTempV = array();
			$this->cache();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				return array($this->key, $this->value);
			for ($j = $this->size()-1; $j >= 0; $j--) {
				$mapTempK[] = $this->key[$j];
				$mapTempV[] = $this->value[$j];
			}
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			return 1;
		}

		// Get all Values >= $v
		public function floorEntry($v) {
			$vMap = '';
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				return array($this->key[0], $this->value[0]);
			for ($i = 0; $i < $this->size(); $i++) {
				if (! ($v >= $this->value[$i])) {
					$vMap[] = $this->key[$i-1];
					$vMap[] = $this->value[$i-1];
					return $vMap;
				}
			}
			return 0;
		}

		// Return all Keys
		public function navigableKeySet() {
			$mapTempK = array();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1)
				return array($this->key[0]);
			for ($i = 0; $i < $this->size(); $i++) {
				$mapTempK[] = $this->key[$i];
			}
			return $mapTempK;
		}

		// Get first entry in Map and remove
		public function pollFirst() {
			$mapTempK = array();
			$mapTempV = array();
			$this->cache();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1) {
				$j[0] = $this->key[0];
				$j[1] = $this->value[1];
				$this->key = null;
				$this->value = null;
				return $j;
			}
			for ($i = 1; $i < $this->size(); $i++) {
				$mapTempK[] = $this->key[$i];
				$mapTempV[] = $this->value[$i];
				break;
			}
			if (sizeof($mapTempK) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex(0);
				return 1;
			}
			$j[0] = $this->key[0];
			$j[1] = $this->value[0];
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->setIndex($this->getIndex());
			return $j;
		}

		// Get last entry in Map and Remove
		public function pollLast() {
			$mapTempK = array();
			$mapTempV = array();
			$this->cache();
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Map');
				return 0;
			}
			else if ($this->size() == 1) {
				$j[0] = $this->key[0];
				$j[1] = $this->value[1];
				$this->key = null;
				$this->value = null;
				return $j;
			}
			for ($i = 0; $i < $this->size(); $i++) {
				$mapTempK[] = $this->key[$i];
				$mapTempV[] = $this->value[$i];
			}
			if (sizeof($tempAneous) == 0) {
				$this->key = null;
				$this->value = null;
				$this->setIndex($this->getIndex());
				return 1;
			}
			$j[0] = $this->key[$this->size()-1];
			$j[1] = $this->value[$this->size()-1];
			$this->key = $mapTempK;
			$this->value = $mapTempV;
			$this->setIndex($this->getIndex());
			return $j;
		}
	}

	function wait($t) {
		$time = time();
		do {	// . . . the hell was he waiting for??
			// You can do this upto 30 secs, per system setup
		} while ($time + $t > time());
	}

	// $this->stream points to your currStrm()
	// an Iter (or revIter) uses it like *p
	// setIndex($val) points $this->stream
	// to the Index $val after joinStrm()
	// has been called
	// Below you'll find the details on the
	// member functions and variables
	class Streams extends Container {

		public $rootType;
		public $parentType;
		public $typeOf;
		// File name
		public $name;
		// Stream pointer
		public $stream;
		public $streamName;
		// $stream array()
		public $seqStrms;
		// Index of $seqStrms
		private $seqCntr;
		// Buffer of Read data
		public $buffData;
		// Read $buffSize amount of data
		public $buffSize;
		// Temporary buffer
		public $buf;
		// Stop at $delim if before $buffSize OR $buffsize == 0
		private $delim;

		public function __construct() {
			$this->seqCntr = 0;
		}

		public function destroy() {
			$this->seqStrms = null;
		}

		// Increment Stream Index
		private function cntIncr() {
			return ++$this->seqCntr;
		}

		// Decrement Stream Index
		private function cntDecr() {
			return --$this->seqCntr;
		}

		// Retrieve Index
		public function getIndex() {
			return $this->seqCntr;
		}

		// Set Index
		public function setIndex($indx) {
			if ($indx >= $this->size())
				return -1;
			return $this->seqCntr = $indx;
		}

		// Create new File Or check if exists
		public function touch($filename) {
			if (file_exists($filename))
				return 1;
			else {
				$r = fopen($filename, 'a+');
				if (file_exists($filename)) {
					fclose($r);
					return 1;
				}
				else
					return 0;
			}
			return 0;
		}

		// Add to Stream array()
		public function add($r, $bool) {
			$rw = '';
			if ($this->typeOf == 'readStream')
				$rw = 'r';
			else if ($this->typeOf == 'rwStream')
				$rw = 'a';
			else $rw = 'w';
			if ($bool == 1)
				$rw .= '+';
			if ($this->touch($r) == 1)
				$this->seqStrms->add($r, fopen($r, $rw));
			else
				return 0;
			if ($this->size() == 1)
				$this->Iter();
			return 1;
		}

		// Report how many streams in Object
		public function size() {
			if (sizeof($this->seqStrms->key) >= 0)
				return sizeof($this->seqStrms->key);
			return -1;
		}

		// Return true if $this has next element
		public function hasNext() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->getIndex()+1 < $this->size())
				return 1;
			return 0;
		}

		// Iterate to next Stream
		public function nextStrm() {
			if ($this->hasNext() == 1) {
				$this->cntIncr();
				$this->joinStrm();
			}
			else if ($this->hasNext() == 0 && $this->size() > 0) {
				$this->setIndex($this->size()-1);
				$this->joinStrm();
				return 0;
			}
			else if ($this->size() == 0) {
				$this->setIndex(0);
				$this->stream = null;
				$this->streamName = null;
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			return 1;
		}

		// Return true if Previous element exists
		public function hasPrev() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->getIndex()-1 > 0)
				return 1;
			return 0;
		}

		// Iterate to Previous Stream in $this
		public function prevStrm() {
			if ($this->hasPrev() == 1) {
				$this->cntDecr();
				$this->joinStrm();
			}
			else if ($this->size() == 1) {
				$this->setIndex(0);
				$this->joinStrm();
				return 0;
			}
			else if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				$this->setIndex(0);
				$this->stream = null;
				$this->streamName = null;
				return 0;
			}
			$this->joinStrm();
			return 1;
		}

		// Iterate forward once
		public function Iter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->size() <= $this->getIndex()) {
				if ($this->strict == 1) throw new IndexException('Invalid Index');
				$this->setIndex(0);
				$this->joinStrm();
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextStrm();
				$this->joinStrm();
				return $this->currStrm();
			}
			else {
				$this->joinStrm();
				return 0;
			}
			return 0;
		}

		public function Cycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->size() <= $this->getIndex()) {
				if ($this->strict == 1) throw new IndexException('Invalid Index');
				$this->setIndex(0);
				$this->joinStrm();
				return 0;
			}
			if ($this->hasNext() == 1) {
				$this->nextStrm();
				$this->joinStrm();
				return $this->currStrm();
			}
			else {
				$this->setIndex(0);
				$this->joinStrm();
				return 0;
			}
			return 0;
		}

		// Iterate backward once
		public function revIter() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->size() <= $this->getIndex())
				$this->setIndex(0);
			if ($this->hasPrev() == 1) {
				$this->prevStrm();
				$this->joinStrm();
				return $this->currStrm();
			}
			else {
				$this->setIndex(0);
				$this->joinStrm();
				return 0;
			}
			return 0;
		}

		// Iterate backward once, or start over
		public function revCycle() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->size() <= $this->getIndex())
				$this->setIndex(0);
			if ($this->hasPrev() == 1) {
				$this->prevStrm();
				$this->joinStrm();
				return $this->currStrm();
			}
			else {
				$this->setIndex($this->size()-1);
				$this->joinStrm();
				return 0;
			}
			return 0;
		}

		// Report current Index point
		public function currStrm() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->getIndex() > $this->size())
				$this->setIndex($this->size());
			return $this->getIndex();
		}

		// Remove Stream at index $r
		public function remSeqStrm($r) {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			$tempAneous = new Map();
			for ($i = 0; $i < $this->size(); $i++) {
				if ($i != $r) {
					$tempor[0] = $this->seqStrms->key[$i];
					$tempor[1] = $this->seqStrms->value[$i];
					$tempAneous->add($tempor[0], $tempor[1]);
				}
			}
			if ($tempAneous->size() == 0) {
				$this->key = null;
				$this->value = null;
				$this->seqStrms->setIndex($this->getIndex());
				return 1;
			}
			$this->Iter();
			$this->seqStrms->setIndex($this->getIndex());
			return $this->seqStrms = $tempAneous;
		}

		// Get FileSize
		public function fileSize() {
			return filesize($this->streamName);
		}

		// Join current Index to Iterator
		public function joinStrm() {
			if ($this->size() == 0) {
				if ($this->strict == 1) throw new IndexException('Empty Stream Array');
				return 0;
			}
			if ($this->getIndex() == 0 || $this->getIndex() >= $this->size())
				$this->setIndex(0);
			$this->stream = $this->seqStrms->value[$this->getIndex()];
			$this->streamName = $this->seqStrms->key[$this->getIndex()];
			return 1;
		}

		// Resize reading Buffer
		public function resize($s) {
			//add preg to assure $s is integer
			if ($s > 0)
				$this->buffSize = $s;
			else
				return 0;
			return 1;
		}

		// Set Delimiter
		public function setDelim($d) {
			return $this->delim = $d;
		}

		// Eliminate Delimiter
		public function resetDelim() {
			return $this->delim = '';
		}

		// Empty Buffer
		public function clearBuf() {
			return $this->buffData = null;
		}

		// Seek to point in file
		public function seek($pos, $flag) {
			$f = '';
			if ($flag == 'e')
				$f = 'SEEK_END';
			else if ($flag == 's')
				$f = 'SEEK_SET';
			else if ($flag == 'c')
				$f = 'SEEK_CUR';
			else if ($flag == 'SEEK_END' || $flag == 'SEEK_SET' || $flag == 'SEEK_CUR')
				$f = $f;
			else
				return -1;
			if ($this->stream == null || $this->streamName == null) {
				throw new IndexException('Stream is null');
				return 0;
			}
			else
				fseek($this->stream, $pos, $f);
			return 1;
		}

		// Check for End of File
		public function eof() {
			if (feof($this->stream) || $this->streamName == null)
				return 0;
			else
				return 1;
		}

		// Read from File
		public function readBuf() {
			if ($this->parentType != 'Streams' && ($this->typeOf != 'rwStream' || $this->typeOf != 'readStream')) {
				throw new IndexException('Not a valid Stream');
				return 0;
			}
			if ($this->size() == 0) {
				throw new IndexException('Empty Stream Array');
				return 0;
			}

			if (!file_exists($this->streamName))
				return 0;
			if ($this->buffSize == 0)
				$y = $this->filesize();
			else
				$y = $this->buffSize;

			for ($i = 0; $i < $y; $i++) {
				$buf = fgetc($this->stream);
				if ($buf == '<')
					$buf = '&lt;';
				if ($buf == $this->delim || feof($this->stream))
					break;
				$this->buffData .= $buf;
			}
			return 1;
		}

		// Write to Buffer File
		public function writeBuf() {
			if ($this->streamName != null && $this->typeOf != 'readStream' && $this->parentType == 'Streams')
				return fwrite($this->stream, $this->buf);
		}

		// Close File
		public function close() {
			fclose($this->stream);
			$this->remSeqStrm($this->getIndex());
			$this->seqStrms->setIndex($this->getIndex());
			return;
		}

		// Change local directory
		public function changeDir($dir) {
			$this->dir = $dir;
			return $this->dir;
		}
	}

	class readStream extends Streams {

		public $stream;
		public $streamName;
		public $parentType;
		public $delim;

		public function __construct() {
			$this->rootType = 'Streams';
			$this->parentType = 'Streams';
			$this->typeOf = 'readStream';
			$this->seqStrms = new Map();
			$this->buffSize = 16;
			$this->seqCntr = 0;
			$this->delim = ';';
		}

	}

	class writeStream extends Streams {

		public $stream;
		public $parentType;

		public function __construct() {
			$this->rootType = 'Streams';
			$this->parentType = 'Streams';
			$this->typeOf = 'writeStream';
			$this->seqStrms = new Map();
			$this->seqCntr = 0;
		}

	}

	class rwStream extends Streams {

		public $stream;
		public $parentType;

		public function __construct() {
			$this->rootType = 'Streams';
			$this->parentType = 'Streams';
			$this->typeOf = 'rwStream';
			$this->seqStrms = new Map();
			$this->seqCntr = 0;
			$this->buffSize = 16;
		}
	}

	class DataLayer {
		// require_once("/datalayer.php?SESSID=918274015094890347");
		// how many people have traveled to the index? A: require datalayer.php w/ one SESSID
		// (how many people have a thread?) A: new Map() of md5(HTTP_ORIGIN), server updates in JSONs!!
		// stacks are threads. Keep md5(stack_maps).ini in /ini/ to keep record of each.
		// when to update?

		// Queue of stacked SESSIDs
		public $stack;
		// Array for SESSID numbers
		public $ADDR_OF_STK;
		// MAX Addrs in Queue before output
		public $ADDR_STK_CNT;
		public $rootType;

		public function __construct() {
			$this->rootType = 'DataLayer';
		}
	}

	class Thread extends Datalayer {
		// *************
		// BEGIN HERE
		// start new thread for Javascript
		// interactions. Pass JSONs dynamically.
		// If a Value changes, it can be reassigned.
		// Setup new Stack(), insert threads
		// and you can have unlimited constructs,
		// like the ones here, in SCHOOL handling
		// the data most civil to break up long and
		// boring but effective ways to act. A running
		// SESSID process, detached.
		// To join it, read from and write to the
		// the file for which it is attached to.
		// Just make sure it is included in the file,
		// and keep this to the core of the dynamics.
		// startThread($filename) to join, do some
		// JSON stuff to it or delimited information.
		// It's ALL GOOOD!!! Have pages refresh every
		// couple minutes or just when the user commands it.
		// To enable simultaneous function:
		// after Interval({}), open md5(user).JSON file
		// and read Array. Dynamically exchange
		// between servers and pages. Keep all
		// code secret by using a rwStream() read to
		// make server updates that fit user needs.
		// Frequency means data congruency
		// between users and admins by JSON.
		// This just personalizes the task.
		// Direct and redirect thru "/ini/" files
		// *************
		public $parentType;
		// Thread pointer
		public $finit;
		// Current local Directory
		private $dir;

		public function __construct() {
			$this->rootType = 'DataLayer';
			$this->parentType = 'DataLayer';
			$this->typeOf = 'Thread';
			$this->finit = new rwStream();
			$this->dir = "ini/";
			$this->finit->seqCntr = 0;
		}

		// $origin mut be Unique to each user.
		// This creates a database of CSV files
		// Each is seemingly randomly named.
		// (Hold sequential $handles in $origin files)
		// Use JSON if CSV is not to your liking.
		public function startThread($origin) {
			$handle = md5($origin);
			if ($this->finit->touch($this->dir . $handle) == 1)
				$this->finit->add($this->dir . $handle, 1);
			else
				return 0;
			$this->finit->Iter();
			return 1;
		}

		// Like all joins
		public function joinThread() {
			return $this->finit->joinStrm();
		}

		// Forward Iteration
		public function nextThread() {
			return $this->finit->nextStrm();
		}

		// Previous Iteration
		public function prevThread() {
			return $this->finit->prevStrm();
		}

		// Forward Iterator
		public function Iter() {
			return $this->finit->Iter();
		}

		// Forward Cycle Iterator
		public function Cycle() {
			if ($this->size() == $this->getIndex()+1) {
				$this->finit->setIndex(0);
				$this->finit->joinThread();
				return 0;
			}
			return $this->finit->Iter();
		}

		// Reverse Iterator
		public function revIter() {
			return $this->finit->revIter();
		}

		// Reverse Cycle Iterator
		public function revCycle() {
			if (-1 == $this->getIndex()-1) {
				$this->finit->setIndex($this->finit->size()-1);
				$this->finit->joinThread();
				return 0;
			}
			return $this->finit->Iter();
		}

		// Empty Thread file
		public function clearThread($origin) {
			$handle = md5($origin);
			if (file_exists($this->dir . $handle) == 1) {
				fopen($this->dir . $handle, 'w');
				if (filesize($this->dir . $handle) == 0)
					return 1;
				else
					return 0;
			}
			else
				return 0;
			return 1;
		}

		// Detach Thread (Its a file, its not going anywhere *hint, hint* other languages)
		public function endThread() {
			$this->finit->remSeqStream($this->finit->getIndex());
			$this->finit->Iter();
			$this->seqStrms->setIndex($this->getIndex());
			return 1;
		}

		// Read from Thread file
		public function readThread() {
			$this->finit->setDelim("}");
			$this->finit->resize(0);
			while (! $this->finit->eof()) {
				$this->finit->readBuf();
				$this->json[] = $this->finit->buffData;
				$this->finit->buffData = null;
			}
			return 1;
		}

		// Write to Thread file
		public function writeThread($obj_array) {
			$x = json_encode($obj_array);
			if ($this->finit->stream == null || $this->finit->streamName == null)
				return 0;
			fwrite($this->finit->stream, $x);
			return 1;
		}
	}

	class Stack extends DataLayer {

		// Wait in milliseconds for wait()
		public $calipers;
		// Queue of threads (was $FIFO)
		public $stack;
		// Max amount of Queued threads
		public $ADDRS_STK_CNT;
		public $parentType;

		public function __construct() {
			$this->rootType = 'DataLayer';
			$this->parentType = 'Thread';
			$this->typeOf = 'Stack';
			$this->ADDRS_STK_CNT = 10;
			$this->calipers = 30000;
			$this->thrdMngr();
			$this->stack = new Queue();
		}

		// Report size of stack
		public function size() {
			if (sizeof($this->stack) >= 0)
				return sizeof($this->stack);
			else return -1;
		}

		// Add all elements of Stack to page
		public function unstack() {
			//tell each session ID to update..
			while ($this->size() > 0) {
				include($this->stack->poll());
			}
		}

		// ADDRS_STK_CNT is a variable of MAX Stack height
		// When surpassed, it calls unstack (careful to not set too high)
		public function thrdMngr() {
			wait($this->calipers);
			if ($this->size() > $this->ADDRS_STK_CNT)
				$this->unstack();
		}

		// Add stack URL
		public function insert($stackurl) {
			$this->stack[] = $stackurl;
		}

		// Empty Stack
		public function clear() {
			$this->stack = array();
		}
	}

	class api {
		public $regex_mapper;
		public $apiMap;

		public function __construct() {
			$this->apiMap = new Vector("Any");
			$this->regex_mapper = "/[nul\,]{4,5}|[\[\{]|[\]\}][\,]{0,1}|[\,0-9_]{1,}[,$]{0,1}|[\,]{0,1}[\"']{0,1}[!#@?\,\\/%A-z0-9\s\._:]+[\"']{0,1}[:\,$]{0,1}/";
		}

		public function apiRecv($s, $bool) {
			// If you don't have one, but need an example,
			// uncomment this line and run it
			//$s = "[ 'oids': [ 'aoi,sd': \"asoda\", 'askd': 9_312, 'ajds': [ 'cucre': [ 'asoidj': \"asdj\", 'aei': [ 'askd': \"adk\" ] ], 'ccsio': [ 'oidfa': \"adfd\" ], 'asdjnae': \"cnaa\", 'asidj': \"sdasa\" ] ] ]";

			preg_match_all($this->regex_mapper, $s, $tok);

			$lvl = 0;
			$tmp = $tok[0];
			echo '<br>';
			$output = "";
			for ($i = 0 ; $i < sizeof($tmp) ; $i++) {
				$temp = $tmp[$i];

				if (preg_match("/[\]\}]/", $temp))
					$lvl--;
				for ($j = 0 ; $j < $lvl ; $j++) {
					$output = $output . "|-----";
				}
				if (preg_match("/[\[\{]/", $temp))
					$lvl++;
				if (preg_match("/[\[\{]/", $temp)) {
					$this->apiMap->push(array($temp));
					$output = $output . $temp . '<br>';
				//	$lvl++;
				}
				else if ($i + 1 < sizeof($tmp) && preg_match("/[\"'][!#@?\,\\/%\-A-z0-9\s\._:]+[\"'][:$]/", $temp)) {
					$i++;
					preg_match("/[!#@?\,\\/%\-A-z0-9\s\._]+/", $temp, $t);
					if ($tmp[$i] == '[' || $tmp[$i] == '{') {
						$this->apiMap->push(array($t[0],$tmp[$i]));
						$lvl++;
					}
					else if (!preg_match("/[!#@?\\/%\-A-z\s_]+/", $tmp[$i])
						&& preg_match("/[0-9\.]+/", $tmp[$i], $tp))
						$this->apiMap->push(array($t[0],$tp[0]));
					else if (preg_match_all("/[nul\,]{4,5}/", $tmp[$i], $nul))
						$this->apiMap->push(array($t[0],$nul[0][0]));
					else {
						preg_match("/[!#@?\,\\/%\-A-z0-9\s\._:]+/", $tmp[$i], $mp);
						$this->apiMap->push(array($t[0],$mp[0]));
					}
					$output = $output . $temp . ' ' . $tmp[$i] . '<br>';
				}
				else if (preg_match("/[\"'][!#@?\,\\/%\-A-z0-9\s\._:]+[\"'][\,$]{0,1}/", $temp)) {
					preg_match("/[!#@?\,\\/%\-A-z0-9\s\._:]+/", $temp, $n);
					$this->apiMap->push(array($n[0]));
					$output = $output . $temp . '<br>';
				}
				else if (preg_match_all("/[\]\}][\,$]{0,1}/", $temp)) {
					$this->apiMap->push(array($temp));
					$output = $output . $temp . '<br>';
				//	$lvl--;
				}
			}
			if ($bool == 1)
				echo $output;
			return $this->apiMap;
		}

		public function clear() {
			$this->apiMap = new Vector("Any");
		}

		// Insert Vector("Any") with simple array(a,b) pairs
		// and to end sections use array("]")
		public function create($va = 0) {
			$outstring = "";
			$lvl = 0;
			if (!is_array($va) || "Any" != $va->childType)
				$va = $this->apiMap;
			for ($i = 0 ; $i < $va->size() ; $i++) {
				$temp = $va->at($i);
				$checkBracket = $va->at($i+1);

				if (sizeof($temp) == 2 && !preg_match("/[!#@?\\/%\-A-z\s_]+/", $temp[1])
					&& preg_match("/[0-9\.]+/", $temp[1], $tp)
					 && sizeof($checkBracket) == 1)
					$outstring = $outstring . "\"" . $temp[0] . "\":" . $tp[0];
				else if (sizeof($temp) == 2 && !preg_match("/[!#@?\\/%\-A-z\s_]+/", $temp[1])
					&& preg_match("/[0-9\.]+/", $temp[1], $tp))
					$outstring = $outstring . "\"" . $temp[0] . "\":" . $tp[0] . ",";
				else if (sizeof($temp) == 2 && preg_match("/[\[\{]/", $temp[1]))
					$outstring = $outstring . "\"" . $temp[0] . "\":" . $temp[1];
				else if (sizeof($temp) == 2 && preg_match("/[nul\,]{4,5}/", $temp[1], $nul))
					$outstring = $outstring . "\"" . $temp[0] . "\":" . $temp[1];
				else if (sizeof($temp) == 2 && sizeof($checkBracket) == 1 && preg_match("/[\}\]]/", $checkBracket[0]))
					$outstring = $outstring . "\"" . $temp[0] . "\":\"". $temp[1] . "\"";
				else if (sizeof($temp) == 2 && sizeof($checkBracket) == 1 && !preg_match("/[\}\]]/", $checkBracket[0]))
					$outstring = $outstring . "\"" . $temp[0] . "\":\"". $temp[1] . "\",";
				else if (sizeof($temp) == 2)
					$outstring = $outstring . "\"" . $temp[0] . "\":\"". $temp[1] . "\",";
				else if (sizeof($temp) == 1 && preg_match("/[\{\[]/", $temp[0], $ty))
					$outstring = $outstring . $ty[0];
				else if (sizeof($temp) == 1 && preg_match("/[\}\]]/", $temp[0], $ty))
					$outstring = $outstring . $temp[0];
				else if (sizeof($temp) == 1 && sizeof($checkBracket) == 1 && !preg_match("/[\}\]]/", $checkBracket[0]))
					$outstring = $outstring . "\"" . $temp[0] . "\",";
				else if (sizeof($temp) == 1)
					$outstring = $outstring . "\"" . $temp[0] . "\"";
			}
			return $outstring;
		}
	}

	class css {
		public $filename;
		public $ext_int;
		public $id;
		public $classname;
		public $selector;
		public $property;
		public $value;
		public $inline;
		public $fwriter;
		public $freader;
		public $html;
		public $desc;
		public $text;
		public $mCSS;
		public $imps;

		public function __construct($fname, $ex_in) {
			$this->filename = $fname;
			$this->fwriter = new writeStream();
			$this->fwriter->add($this->filename,0);
			$this->ext_int = $ex_in;
			$this->mCSS = new mMap();
			$this->imps = new Set();
		}

		public function addText($txt) {
			$this->text = $this->text . ' ' . $txt;
			return $this->text;
		}

		public function newText($txt) {
			$this->text = $txt;
			return $this->text;
		}

		public function insCSS($selector, $map) {
			$this->mCSS->newMap($selector, $map);
			return 1;
		}

		public function help() {
			echo '<br>Help for CSS Creation:<br>';
			echo '1. Create a new Map()<br>';
			echo '2. Each Key will need to contain one property<br>';
			echo '3. Each Value must contain associated value<br>';
			echo '4. Next, contain them in \$this->mCSS by using \$this ->insContent(\$selector,\$map)<br>';
			echo '5. Each Key in \$this->mCSS (\$this ->mCSS->mname) MUST be the selector(s) (classname, id, tag)<br>';
			echo ' * hint: pull nested map from \$this->mCSS->mmap, then use Map() commands,<br>';
			echo ' and reinsert it with \$this->mCSS->replace()<br>';
		}

		public function write() {
			if (sizeof($this->mCSS) == 0)
				return -1;
			if ($this->fwriter->size() == 0)
				return -1;
			if (!file_exists($this->filename)) {
				$this->fwriter->touch($this->filename);
			} 
			if (file_exists($this->filename)) {
				$this->fwriter->Iter();
				if ($this->ext_int == 0) {
					$this->fwriter->buf = '<style>';
					$this->fwriter->writeBuf();
				}
				$this->mCSS->setIndex(0);
				$this->mCSS->sync();
				$i = 0;
				while (sizeof($this->imps->dat) > $i) {
					$this->fwriter->buf = "@import url('" . $this->imps->dat[$i] . "');";
					$this->fwriter->writeBuf();
					$i++;
				}
				do {
					$temp = $this->mCSS->mmap;
					$this->fwriter->buf = $this->mCSS->mname . ' {';
					$this->fwriter->writeBuf();
					$i = 0;
					while (sizeof($temp->key) > $i) {
						$this->fwriter->buf = $temp->key[$i] . ":" . $temp->value[$i] . ";";
						$this->fwriter->writeBuf();
						$i++;
					}
					$this->fwriter->buf = '}';
					$this->fwriter->writeBuf();			
				} while ($this->mCSS->Iter());
				if ($this->ext_int == 0) {
					$this->fwriter->buf = '</style>';
					$this->fwriter->writeBuf();
				}
			}
			else
				echo "Could not create file $this->filename";
		}

		public function cssMap($s, $bool) {
			// If you don't have one, but need an example,
			// uncomment this line and run it
			//$s = "[ 'oids': [ 'aoi,sd': \"asoda\", 'askd': 9_312, 'ajds': [ 'cucre': [ 'asoidj': \"asdj\", 'aei': [ 'askd': \"adk\" ] ], 'ccsio': [ 'oidfa': \"adfd\" ], 'asdjnae': \"cnaa\", 'asidj': \"sdasa\" ] ] ]";
			$s = "@import url('dss.css'); #id .classname p b { property:value; property-1: value; } .classname p b { property:value; property-1: value; }";
			preg_match_all("/[\{\}]|[0-9\.]+[;$]|[\"'#@\(\)>\-A-z0-9\s\.]+[\{:;$]{1}/", $s, $tok);

			$lvl = 0;
			$tmp = $tok[0];
			echo '<br>';
			$output = "";
			$smallMap = new Map();
			$apiMap = new mMap();
			$mapname = "";
			for ($i = 0 ; $i < sizeof($tmp) ; $i++) {
				$temp = $tmp[$i];

				if (preg_match("/[\}]/", $temp))
					$lvl = 0;
				for ($j = 0 ; $j < $lvl ; $j++) {
					$output = $output . "|-----";
				}
				if (preg_match("/[\{]/", $temp))
					$lvl = 1;
				$imps = 0;
				if ($i + 1 < sizeof($tmp) && preg_match("/[\"'#@\(\)>\-A-z0-9\s\.]+[\{:$]{0}/", $temp, $t)) {
					if (preg_match("/[\{]/", $temp, $tk)) {
						$output = $output . '<br>' . $t[0] . ' ' . $tk[0] . '<br>';
						$mapname = $temp;
					}
					else if (preg_match("/[@]/", $temp)) {
						preg_match_all("/[\@impor]+[t\s$]{1,2}|[url\(][\"'$]{1}+|[_\-A-z0-9\s\.]+|['\"\)$]{2}+|[;$]/", $temp, $tk);
						$this->imps->add($tk[0][3]);
						$output = $output . '<br>@import ("' . $tk[0][3] . '");<br>';
					}
					else {
						$i++;
						preg_match("/[\(\)\-A-z0-9\s\.]+[;$]{0}/", $tmp[$i], $tm);
						$smallMap->add($t[0],$tm[0]);
						$output = $output . $t[0] . ': ' . $tm[0] . ';<br>';
					}
				}
				else if (preg_match_all("/[\}]{1}/", $temp)) {
					$apiMap->newMap($mapname,$smallMap);
					$smallMap->clear();
					$mapname = "";
					$output = $output . $temp . '<br>';
				}
			}
			$this->mCSS = $apiMap;
			if ($bool == 1)
				echo $output;
			return $apiMap;
		}

		public function create($va) {
			$outstring = "";
			$lvl = 0;
			if ("mMap" != $va->typeOf)
				return 0;
			$i = 0;
			$va->setIndex(0);
			$va->sync();
			if ($this->ext_int)
				$outstring = $outstring . "<style>";
			while (sizeof($this->imps->dat) > $i) {
				$outstring = $outstring . "@import url('" . $this->imps->dat[$i] . "');";
				$i++;
			}
			do {
				$temp = $va->mmap;
				if (preg_match("/[\{]/", $va->mname))
					$outstring = $outstring . $va->mname;
				else
					$outstring = $outstring . $va->mname . " {";
				$i = 0;
				while ($temp->size() > $i) {
					if (preg_match("/[:]/", $temp->key[$i]))
						$outstring = $outstring . $temp->key[$i];
					else
						$outstring = $outstring . $temp->key[$i] . ":";
					if (preg_match("/[;]/", $temp->value[$i]))
						$outstring = $outstring . $temp->value[$i];
					else
						$outstring = $outstring . $temp->value[$i] . ";";
					$i++;
				}
				$outstring = $outstring . '}';
			} while ($va->Iter());
			if ($this->ext_int)
				$outstring = $outstring . "</style>";
			return $outstring;
		}
	}

	class Version {
		public function __construct($vbool)  {
			if ($vbool == 0) {
				echo 'SCHOOL PHP - Version 1.3.7 Release 3465<br>';
				echo 'Swatch Container Hypertext Object Oriented Library + API Handler for PHP';
			}
			else if ($vbool == 1)
				echo 'SCHOOL v1.3.7 Release 3465';
			else
				for ($i = 0 ; $i < $vbool ; $i++)
					echo "Was \$vbool too complex an idea for you? ... ";
		}
	}

	function about($vbool) { $m = new Version($vbool); } ?>
