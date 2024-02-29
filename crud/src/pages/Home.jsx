import React from 'react'
import Table from 'react-bootstrap/Table';
export default function Home({ users }) {

  return (
    <div>
      <h1>Home</h1>
      <Table striped bordered hover>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user,i) => {
            return <tr key={i}>
              <td>{i+1}</td>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>{user.address}</td>
            </tr>
          })}
        </tbody>
      </Table>
    </div>
  )
}
