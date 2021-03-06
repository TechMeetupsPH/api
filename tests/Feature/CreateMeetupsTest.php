<?php namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Meetup;

class CreateMeetupsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function meetup_can_be_created()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/api/meetup', [
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
            'city' => 'Test City',
        ]);

        $response->assertStatus(200);

        $meetup = Meetup::where('title', '=', 'Test Title')->first();

        $this->assertEquals($meetup->title, 'Test Title');
        $this->assertEquals($meetup->start_date, '2018-05-23 06:00:00');
        $this->assertEquals($meetup->end_date, '2018-05-23 08:00:00');
        $this->assertEquals($meetup->detail, 'Test About');
        $this->assertEquals($meetup->address, 'Test Address');
    }

    /** 
     * @test
     */
    public function meetup_title_is_required()
    {
        $response = $this->json('POST', '/api/meetup',[
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'title' => [
                    'The title field is required.'
                ]
            ]
        ]);
    }

    /**
     * @test
    */
    public function meetup_start_date_is_required()
    {
        $response = $this->json('POST', '/api/meetup',[
           'title' => 'Test Title',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'start_date' => [
                    'The start date field is required.',
                ]
            ]
        ]);
    }

    /**
     * @test
    */
    public function meetup_end_date_is_required()
    {
        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'end_date' => [
                    'The end date field is required.',
                ]
            ]
        ]);
    }

    /**
     * @test
    */
    public function meetup_address_is_required()
    {
        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'address' => [
                    'The address field is required.',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function meetup_title_max_characters_should_be_256()
    {
        $response = $this->json('POST' , '/api/meetup',[
            'title' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                      It has roots in a piece of classical Latin literature from 45 BC, making it over
                      2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                      Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                      Ipsum passage, and going through the cites of the word in classical literature,
                      discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                      of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                      45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                      The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'detail',
            'address' => 'address'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'title' => [
                        'The title may not be greater than 256 characters.'
                    ]
                ]
        ]);
    }

    /**
     * @test
     */
    public function meetup_detail_max_characters_should_be_512()
    {
        $response = $this->json('POST' , '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                    2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                    Ipsum passage, and going through the cites of the word in classical literature,
                    discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                    45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'address' => 'address'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'detail' => [
                        'The detail may not be greater than 512 characters.'
                    ]
                ]
        ]);
    }

        /**
     * @test
     */
    public function meetup_address_max_characters_should_be_512()
    {
        $response = $this->json('POST' , '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Contrary to popular belief, Lorem Ipsum is not simply random text.
                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                    2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                    Ipsum passage, and going through the cites of the word in classical literature,
                    discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in
                    45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'address' => [
                        'The address may not be greater than 512 characters.'
                    ]
                ]
        ]);
    }

    

    /**
     * @test
     */
    public function start_date_should_be_in_correct_date_format()
    {
        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018/05/23',
            'end_date' => '2018/05/23',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);
    
        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                "start_date" => [
                    "The start date does not match the format Y-m-d H:i:s."
                ]

            ]
        ]);
    }

    /**
     * @test
     */
    public function end_date_should_be_in_correct_date_format()
    {
        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test Title',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018/05/23',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);
    
        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                "end_date" => [
                    "The end date does not match the format Y-m-d H:i:s."
                ]

            ]
        ]);
    }

    /**
     * @test
     */
    public function city_is_required()
    {
        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test City',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'city' => [
                    'The city field is required.'
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function city_character_must_not_exceed_255()
    {

        $city = "";

        for ($i = 0; $i <= 255; $i++) {
            $city .= "a";
        }

        $response = $this->json('POST', '/api/meetup',[
            'title' => 'Test City',
            'start_date' => '2018-05-23 06:00:00',
            'end_date' => '2018-05-23 08:00:00',
            'detail' => 'Test About',
            'address' => 'Test Address',
            'city' => $city,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'city' => [
                    'The city may not be greater than 255 characters.'
                ]
            ]
        ]);
    }
}
