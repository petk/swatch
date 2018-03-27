<?php
session_start();

include("swatch.php");
about(3);
echo '<br>';
$t = new writeStream();

$m = new Map();
for ($i = 0 ; $i < 5 ; $i++)
	$m->add($i, ':)');

$t->touch(md5("inland14"));
$t->add(md5("inland14"),0);
$t->Iter();
$x = 0;
while (!$m->isEmpty()) {
	$t->buf = json_encode($m->get($x));
	$t->writeBuf();
	$m->remove($x);
	echo $m->size() . " ";
	$x++;
}
$s = new Vector('Set');
$j = new Set();
$r = 0;
$q = new Set();
do {
	$s->push($j);
} while ($r++ < 4);

$i = 0;
// As far as I know, This framework's
// vector iterators are completely restricted
// to using do-while & for loops
echo '<br>';
$yo = 5;
$r = 0;
while ($s->Iter()) {
	$q->add(++$yo);
	$j->add($r);
	$s->vect = $j;
} 

//Don't forget to sync your Maps and Vectors!!
$s->vect = $q;

echo "I've incremented each of these once<br>";
$i = 0;
while ($s->revIter()) {
	$d = $s->vect;
	echo $s->vect->dat[$i] . '<br>';
}
echo '<br>' . json_encode($s) . '<br>';
$s->vect->dat[$i] = 4;
echo '<br>' . json_encode($s->vect) . '<br>';

//$b = new Thread();
//$b->startThread("david");
//$b->writeThread($s);
//$t->buf = json_encode($s->dat);
//$t->writeBuf();

$s->clear();
$ms = new Map();
$ms->add("yay", "me!");
$ms->add("yay1", "me!");


// This is a writeable iterator!!
while ($ms->Iter()) {
	echo json_encode($ms->map) . '<br>';
	$ms->replace("yay", "Value");
	$ms->add("yay","no");
}

echo '<br><br>' . json_encode($ms);
// Above I changed the KV pairs to "New/Value"
// And below I'll show it worked during a reverse Iter
// (which is also writeable!)
// Don't be deceived by the output, this is a bad example
while ($ms->revIter()) {
	$ms->map = array("yay1", ":P");
	echo json_encode($ms->map) . '<br>';
}

$mm = new mMap();
$mm->newMap('MS',$ms);
$mm->newMap('M1',$ms);
$mm->newMap('M2',$ms);
$ms->replace("yay1",":P");
$mn = new Map();
$mn->add("ay", "me!");
$mn->add("ay1", "me!");
$mm->replace('MS',$mn);
//$mm->destroy();
//After destroy() clear object to null
//$mm = null;
echo $mm->size();
$mm->setIndex(0);
$mt = new Map();
$mt->add("ya", "me!");
$mt->add("ya1", "me!");
do {
	echo "L";
} while ($mm->Iter());
$mm->setIndex($mm->size()-1);
$mm->mmap = $mt;
$mm->sync();
$temp = $mm->getMap('/S/');
$e = $mm->findKey('/ya/');
echo '<br>???' . json_encode($e) . '<br>';
echo json_encode($mm);
echo '<br><br>';
echo json_encode($temp);


echo '<br><br>Become an API expert over night!<br>';
// For API Handling
$y = new api();
// JSON from wherever
$sd = "['oids':['.class,#cssId':\"a\/?@ soda\",'askd':\"9_3.12\",'ajds':['cucre':['asoidj':\"asdj\",'aei':['askd':\"adk\",]],'ccsio':['oidfa':\"adfd\",],'asdjnae':\"cnaa\",'asidj':\"sdasa\"]]]";
// Parameter 2 for apiRecv -- The '1' creates the output as shown
// using a 0 will stop the printout from happening
$n = $y->apiRecv($sd, 1);
echo "This is what the Vector<'Any'> looks like from $sd<br><br>";
echo json_encode($n);
// Justing flipping this back into the same thing (MAGIC!)
// Create only takes 1 parameter, it can be anything.
// If it's not a Vector("Any"), than it uses the result of
// $this->apiRecv()
$j = $y->create($n);
echo '<br><br>' . $j;
// This is my favorite part! -- Again, the '1' makes the tree
$re = $y->apiRecv($j, 1);
echo '<br><br>' . json_encode($re);
echo '<br><br>' . json_encode($y->apiMap);
$y->clear();
//$newMap->
// Now! CSS!!

$o = new css("readcss.css", 1);
$eq = $o->cssMap($s,1);
$mh = $o->create($eq);
echo $mh;
$o->fwriter->setIndex(0);
$o->write();

echo $o->help();
// Justing flipping this back into the same thing (MAGIC!)
// Create takes 0 or 1 parameter(s), it can be anything.
// If it's not a Vector("Any"), than it uses the result of
// $this->apiRecv();
// Rip it up!! Move from object to vector
// then back again
$p = $y->apiRecv(json_encode($mm),1);
$re = $y->create();

echo '<br><br>' . $re;
echo '<br><br>' . $ry = json_decode($re);
echo $ry->key[0];
?>
