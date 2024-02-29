import React from 'react'
import { Route, Routes } from 'react-router-dom'
import Home from '../pages/Home'
import About from '../pages/About'

export default function Links({users}) {
  return (
    <div>
      <Routes>
        <Route path='/' element={<Home users={users}/>}></Route>
        <Route path='/about' element={<About/>}></Route>
      </Routes>
    </div>
  )
}
