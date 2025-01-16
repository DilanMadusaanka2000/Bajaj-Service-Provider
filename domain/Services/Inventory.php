<?php
namespace domain\Services;
use App\Models\SpareParts;


class Inventory
{
    protected $task;



    public function __construct()
    {
        $this->task = new SpareParts();
    }




    // Store data
    public function store($data)
    {
        $this->task->create([
            'name' => $data['name'],
            'category' => $data['category'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'stock' => $data['stock'],
            'description' => $data['description'] ?? null,
            'image' => $data['image'], // Save the image path
        ]);
    }

    






    // Retrieve all data
    public function all()
    {
        $data = $this->task->all();
        return $data;
    }




    public function find($spareParts_id)
    {
        return $this->task->find($spareParts_id); // Fetch by primary key (assuming id is the primary key)
    }







    // In Inventory.php (Service file)
    public function quantity()
        {
            return $this->task->where('stock', '<', 10)->get(); // Fetch items with low stock
        }



}
?>
