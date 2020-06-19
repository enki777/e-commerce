import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class CategoriesList extends Component {
    constructor() {
        super()
        this.state = {
            categories: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                categories: response.data['categories'],
            })
        })
    }

    render() {
        const categories = this.state.categories
        // console.log(categories)
        return (
            <div className="card bg-dark">
                <div className="card-header text-white">
                    <h3>Categories</h3>
                </div>
                <div className="card-body">
                    <ul className="list-group">
                        {categories.map(category => (
                            <Link
                                className="list-group-item bg-dark text-primary text-decoration-none list-unstyled"
                                to={`/matches/category/${category.id}`}
                                key={category.id}
                            >
                                <li key={category.id}>{category.name}</li>
                            </Link>
                        ))}
                    </ul>
                </div>
            </div>
        )
    }
}

export default CategoriesList