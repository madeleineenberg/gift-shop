import React, { useContext, useEffect, useState } from 'react';
import { PersonContext } from '../contexts/PersonContext';
import { useHistory } from 'react-router-dom';

export default function ResultPage() {
  const { personList, setPersonList, correctStarted } =
    useContext(PersonContext);
  const history = useHistory();

  const [query, setQuery] = useState('');

  useEffect(() => {
    if (!correctStarted) {
      history.push('/');
    }
    createQuery();
  }, []);

  const createQuery = () => {
    let gift = giftDict[personList].toLowerCase().split(' ').join('-');
    setQuery(gift);
    console.log(gift);
  };

  const giftDict = {
    aaa: 'Cool T-Shirt',
    baa: 'Cool Hoody',
    caa: 'Warm Socks',
    aba: 'Star Wars figure',
    bba: 'Marvel T-Shirt',
    cba: 'Google home',
    aca: 'Coloring Book',
    bca: 'Screwdriver',
    cca: 'Knitting Kit',
    aab: 'Nike Sneakers',
    bab: 'Branded Jewellry',
    cab: 'Nice Hat',
    abb: 'Iphone',
    bbb: 'Xbox',
    cbb: 'Air pods',
    acb: 'Coloring Kit',
    bcb: 'Bucket hat',
    ccb: 'Crafts Table',
    aac: 'Silver ring',
    bac: 'Soap',
    cac: 'Gold necklace',
    abc: 'Tesla Car',
    bbc: 'Smart Home Sockets',
    cbc: 'Wifi Lamps',
    acc: 'Molding Kit',
    bcc: 'Sewing Kit',
    ccc: 'Playdough',
  };

  return (
    <div className='app-container'>
      <h2 className='subtitle'>Result:</h2>
      <a
        className='result-link'
        href={`http://testproject.local/product/${query}`}
      >
        <h3>{giftDict[personList]}</h3>
      </a>
      <h3>🎁</h3>
    </div>
  );
}
