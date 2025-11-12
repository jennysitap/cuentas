import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import ItemComponent from './components/ItemComponent'
import Button from 'react-bootstrap/Button';

function App() {
  var X=0
  //React Hooks
  let [contador, setContador] = useState(10)
  let [arr, setArr]=useState([])
  let clickBoton=()=>{
    setContador(++contador)
    console.log(contador)
    let x=[...arr,contador]
    setArr(x)
  }
  return (
    <>
      <h1>Contador</h1>
      <Button variant="dark">Dark</Button>
      <p>{contador}</p>
      <button onClick={clickBoton}>Aumentar</button>
      {arr.map((item)=>(<ItemComponent key={item}/>))}
    </>
  )
}

export default App
