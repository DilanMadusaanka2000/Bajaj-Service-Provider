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
    public function store($data, $sparePartsId = null)
    {
        if ($sparePartsId) {
            // Update the record if an ID is provided
            $sparePart = $this->task->find($sparePartsId);
            if ($sparePart) {
                $sparePart->update($data);
                return $sparePart;
            }
        }
        // Create a new record if no ID is provided
        $this->task->create($data);
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
