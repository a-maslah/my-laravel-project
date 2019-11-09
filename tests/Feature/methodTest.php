<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pasport;
use Auth;

class MethodTest extends TestCase
{
     
   use RefreshDatabase;
    public function testIndex()
    {
        $respense=$this->get('/pasports');
        $respense->assertSeeText('list des pasports');
    }

    public function testDataBase()
    {
        $DbCotext=new Pasport();
        $DbCotext->nom='amine';
        $DbCotext->prenom='mourid';
        $DbCotext->email='email';
        $DbCotext->CIN='12345';
        $DbCotext->NUP='12223344';
        $DbCotext->user_id='1';
        $DbCotext->save();

        $this->assertDatabaseHas('pasports',[
            'prenom'=>'mourid',
        ]);
    

    }
    public function testStoreMethod()
    {
        $data=[
            'nom'=>'mourid',
            'prenom'=>'amine',
            'email'=>'amine@morid.com',
            'CIN'=>'1234',
            'NUP'=>'1234',

        ]  ;
        $this->get('/pasports',$data)
        ->assertStatus(302)
        ->assertSessionHas('add');
        $this->assertEquals(session('add'),'the addition done successfuly!!');
        

    }
    public function TestValidationStore()
    {
        $data=[
            'nom'=>'',
            'prenom'=>'',
            
        ]  ;
        $this->get('/pasports',$data)
        ->assertStatus(302)
        ->assertSessionHas('errors');
        $message=session('errors')->getMessage();
        $this->assertEquals($message['nom'][0],'message');
        $this->assertEquals($message['prenom'][1],'message');
    }

    public function testUpdate()
    {
        $pass=new Pasport();
        $pass->nom='amine';
        $pass->prebom='preom';
        $pass->email='email';
        $pass->CIN='CIN';
        $pass->NUP='NUP';
        $pass->save();
        $this->assertDatabaseHas('pasports',$pass->toArray());

        $data=[
            'nom'=>'ahmed',
            'preom'=>'mourid',
            'email'=>'email@email.com',
            'CIN'=>'12332',
            'NUP'=>'123475',

        ];
        $this->put("pasports/{$pass->id}",$data)
        ->assertStatus(302)
        ->assertSessionHas('update');
        $this->assertEquals(session('update'),'the update done successfuly !');
        $this->assertDataBaseHas('pasports',[
            'nom'=>$data['ahmed']
 
        ]);
        $this->assertDatabaseMissing('pasports',[
            'nom'=>$pass->nom
        ]);


    }
    public function testDelete()
    {
        $pass=new Pasport();
        $pass->nom='amine1';
        $pass->prenom='mourid';
        $pass->email='email@email.com';
        $pass->NUP='1234';
        $pass->CIN='1234';
        $pass->save();
        $this->assertDatabaseHas('pasports',$pass->toArray());

      $this->delete("pasports/{$pass->id}")
      ->assertStatus(302)
      ->assertSessionHas('delete');
      $this->assertEquals(session('delete'),'the delete done successfuly !');
      $this->assertDatabaseMissing('pasports',[
          'nom'=>$pass->nom
      ]);

    }

}