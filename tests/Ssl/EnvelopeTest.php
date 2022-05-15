<?php

use Strukt\Ssl\KeyPairBuilder;
use Strukt\Ssl\Config;
use Strukt\Ssl\Envelope;
use Strukt\Ssl\PublicKeyList;

use PHPUnit\Framework\TestCase;

class EnvelopeTest extends TestCase{

	public function setUp():void{

		$this->builder = new KeyPairBuilder(new Config());

		$this->envelope = new Envelope($this->builder);
	}

	// public function testSingleSealUnseal(){
	public function testSealSingle(){

		$paths[] = sprintf("file://%s/fixture/cacert.pem", getcwd());

		$message = "Hello World!";

		$sealed = Envelope::withCerts($paths)->close($message);

		$this->assertNotNull($sealed[0]);
	}

	public function testSealUnsealMany(){

		$this->markTestSkipped("@todo:UnsealMany");

		// $msg = "Shit is sublime. The combinnation of alliteration and internal rhymes.";

		// foreach(range(0,2) as $idx){

		// 	$builder = new KeyPairBuilder(new Config());
		// 	$pubKeys[] = $builder->getPublicKey()->getPem();
		// 	$builders[] = $builder;
		// }

		// list($keys, $sealed) = Envelope::closeAllWith(new PublicKeyList($pubKeys), $msg);

		// foreach(range(0,2) as $idx){

		// 	$envelope = new Envelope($builders[$idx]);
		// 	$this->assertEquals($msg, $envelope->open($keys[$idx], $sealed));
		// }
	}
}