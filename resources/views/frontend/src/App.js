import './App.css';
import Navbar from './Component/Navbar/Navbar';
import {BrowserRouter , Routes , Route} from 'react-router-dom';
import Shop from './Pages/Shop';
import Cart from './Pages/Cart';
import Home from './Pages/Home';
import Login  from './Pages/Login';
import Product from './Pages/Product';


function App() {
  return (
    <div>
        <BrowserRouter>


        <Navbar />
        <Routes>
            <Route path='/' element={<Home/>}/>

            <Route path='/cart' element={<Cart/>}/>
            <Route path='/login' element={<Login/>}/>

            <Route path='/product' element={<Product/>}>
            <Route path='product/:id' element={<Product/>}/>
            </Route>





        </Routes>


        </BrowserRouter>


    </div>
  );
}

export default App;
