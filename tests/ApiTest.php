<?php


class ApiTest extends TestCase
{
    public function testGetAll()
    {
        $response = $this->call('GET', '/api/v1/products');
        $this->assertEquals(200, $response->status());
    }

    public function testGet()
    {
        $response = $this->call('GET', '/api/v1/products/5');
        $this->assertEquals(200, $response->status());

        $response = $this->call('GET', '/api/v1/products/5555');
        $this->assertEquals(404, $response->status());
    }

    public function testPost()
    {
        $this->post('/api/v1/products', [
                'name' => 'HP Computer',
                'description' => 'This is a nice computer',
                'unit_price' => '555',
            ])->seeJson([
                'name' => 'HP Computer',
                'description' => 'This is a nice computer',
                'unit_price' => '555',
            ]);
    }

    public function testPut()
    {
        $this->put('/api/v1/products/5', [
                'name' => 'HP Computer',
                'description' => 'This is a nice computer',
                'unit_price' => '555',
            ])->seeJson([
                'name' => 'HP Computer',
                'description' => 'This is a nice computer',
                'unit_price' => '555',
            ]);

        $response = $this->call('PUT', '/api/v1/products/5555');
        $this->assertEquals(404, $response->status());
    }

    public function testDelete()
    {
        $response = $this->call('DELETE', '/api/v1/products/1');
        $this->assertEquals(200, $response->status());

        $response = $this->call('DELETE', '/api/v1/products/5555');
        $this->assertEquals(404, $response->status());
    }
}
