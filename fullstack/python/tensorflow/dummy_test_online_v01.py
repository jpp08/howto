
# -*- coding: utf-8 -*-
"""_index.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/github/tensorflow/docs/blob/master/site/en/tutorials/_index.ipynb

##### Copyright 2018 The TensorFlow Authors.
Licensed under the Apache License, Version 2.0 (the "License");
"""

#@title Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
# https://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

import tensorflow as tf

"""Load and prepare the [MNIST](http://yann.lecun.com/exdb/mnist/) dataset. Convert the samples from integers to floating-point numbers:"""

mnist = tf.keras.datasets.mnist
(x_train, y_train), (x_test, y_test) = mnist.load_data()
x_train, x_test = x_train / 255.0, x_test / 255.0
model.evaluate(x_train, y_train)

"""Build the `tf.keras` model by stacking layers. Select an optimizer and loss function used for training:
features: A Tensor. Must be one of the following types: float32, float64, int32, uint8, int16, int8, int64, bfloat16, uint16, half, uint32, uint64, qint8.
 The dropout rate, between 0 and 1. E.g. rate=0.1 would drop out 10% of input units.
"""

model = tf.keras.models.Sequential([
  tf.keras.layers.Flatten(),
  tf.keras.layers.Flatten(),
  tf.keras.layers.Dense(32, activation=tf.nn.relu),
  tf.keras.layers.Dropout(0.4),
  tf.keras.layers.Dense(10, activation=tf.nn.softmax)
])

model.compile(optimizer='adam',
              loss='sparse_categorical_crossentropy',
              metrics=['accuracy'])

"""Train and evaluate model:"""

model.fit(x_train, y_train, epochs=5)
model.evaluate(x_test, y_test)

#predictedLabels = model.predict(x=x_test, verbose=1)


"""You’ve now trained an image classifier with ~98% accuracy on this dataset. See [Get Started with TensorFlow](https://www.tensorflow.org/get_started/) to learn more."""


