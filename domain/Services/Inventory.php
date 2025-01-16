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


}
?>
