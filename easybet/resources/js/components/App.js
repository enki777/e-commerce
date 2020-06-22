import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Header from './Header';
import Index from './index/index';
import SingleMatch from './index/matches/SingleMatch';
import MatchesGameList from './index/matches/MatchesGameList';
import MatchesCategoryList from './index/matches/MatchesCategoryList';
import MatchesSearch from './index/matches/MatchesSearch';
import GameDetails from "./Admin/Game/GameDetails";
import GameCreate from "./Admin/Game/GameCreate";
import GameEdit from "./Admin/Game/GameEdit";
import CategoryCreate from "./Admin/Category/CategoryCreate";
import CategoryDetails from "./Admin/Category/CategoryDetails";
import CategoryEdit from "./Admin/Category/CategoryEdit";
import Register from './User/Auth/Register';
import Login from './User/Auth/Login';
import MatchCreate from "./Admin/Match/MatchCreate";
import MatchEdit from "./Admin/Match/MatchEdit";
import UserDetails from './Admin/User/UserDetails';
import DashboardMatch from './Admin/DashboardMatch';
import DashboardGame from './Admin/DashboardGame';
import DashboardCategory from './Admin/DashboardCategory';
import DashboardUser from './Admin/DashboardUser';
import IndexUpcoming from './index/IndexUpcoming';
import IndexFinished from './index/IndexFinished';


class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header />
                    <Switch>
                        {/* <Route exact path='/matches/index/:id' component={Index} /> */}
                        <Route exact path='/' component={Index} />
                        <Route exact path='/matches/bet/:id' component={Index} />
                        <Route exact path='/matches/upcoming' component={IndexUpcoming} />
                        <Route exact path='/matches/finished' component={IndexFinished} />
                        <Route exact path='/matches/:id' component={SingleMatch} />
                        <Route exact path='/matches/game/:id' component={MatchesGameList} />
                        <Route exact path='/matches/category/:id' component={MatchesCategoryList} />
                        <Route exact path='/matches/search/:matches' component={Index} />
                        <Route exact path='/register' component={Register} />
                        <Route exact path='/login' component={Login} />
                        <Route exact path='/admin' component={DashboardMatch} />
                        <Route exact path='/admin/game' component={DashboardGame} />
                        <Route exact path='/admin/category' component={DashboardCategory} />
                        <Route exact path='/admin/user' component={DashboardUser} />
                        <Route exact path='/admin/game/create' component={GameCreate} />
                        <Route exact path='/admin/game/:id/' component={GameDetails} />
                        <Route exact path='/admin/game/edit/:id/' component={GameEdit} />
                        <Route exact path='/admin/category/create/' component={CategoryCreate} />
                        <Route exact path='/admin/category/:id' component={CategoryDetails} />
                        <Route exact path='/admin/category/edit/:id' component={CategoryEdit} />
                        <Route exact path='/admin/match/create' component={MatchCreate} />
                        <Route exact path='/admin/match/edit/:match' component={MatchEdit} />
                        <Route exact path='/admin/user/:id' component={UserDetails} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))
