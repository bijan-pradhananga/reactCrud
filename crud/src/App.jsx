import { useState } from "react"
import Footer from "./Footer"
import Header from "./Header"
import axios from "axios"
import { useEffect } from "react";
import Links from "./routes/Links";
import 'bootstrap/dist/css/bootstrap.css';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';


function App() {
  const [users, setUsers] = useState([]);
  const fetchData = async () => {
    try {
      const response = await axios.get('http://localhost/bca4thsemproject/api/index.php');
      setUsers(response.data)
    } catch (error) {
      console.log(error);
    }
  }

  useEffect(() => {
    fetchData();
  }, [])

  return (
    <>
      <Container fluid="md">
        <Row>
          <Col lg={12} md={12} xs={12}>
            <Header></Header>
            <Links users={users}></Links>
            <Footer></Footer>
          </Col>
        </Row>
      </Container>

    </>
  )
}

export default App
