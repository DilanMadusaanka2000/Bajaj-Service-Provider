import React from 'react';
import './Item.css';

const Item = ({ id, name, image, new_price, old_price }) => {
  return (
    <div className="item-card" id={`item-${id}`}>
      <img src={image} alt={name} className="item-image" />
      <h3>{name}</h3>
      <p>
        <span className="new-price">${new_price}</span>
        <span className="old-price">${old_price}</span>
      </p>
    </div>
  );
};

export default Item;
