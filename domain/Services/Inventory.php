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
        return $this->task->all();
    }
}
?>
